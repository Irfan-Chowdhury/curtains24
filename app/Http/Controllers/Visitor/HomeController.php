<?php

namespace App\Http\Controllers\Visitor;

use App\Models\BookingSchedule;
use App\Models\Hero;
use App\Models\Module;
use App\Models\PrivacyAndPolicy;
use App\Models\TermAndCondition;
use App\Models\User;
use App\Notifications\BookingCreatedNotification;
use App\Services\AvailableTimeService;
use App\Services\BannerService;
use App\Services\CurtainSizeService;
use App\Services\CurtainTypeService;
use App\Services\SettingService;
use App\Services\SliderService;
use App\Services\StorefrontService;
use App\Services\TestimonialService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class HomeController
{
    private $bannerService;
    private $sliderService;
    private $testimonialService;
    private $curtainSizeService;

    public function __construct(
        BannerService $bannerService,
        SliderService $sliderService,
        TestimonialService $testimonialService,
        CurtainSizeService $curtainSizeService,
        private CurtainTypeService $curtainTypeService,
        private AvailableTimeService $availableTimeService,
        private StorefrontService $storefrontService
        )
    {
        $this->bannerService = $bannerService;
        $this->sliderService = $sliderService;
        $this->testimonialService = $testimonialService;
        $this->curtainSizeService = $curtainSizeService;
    }

	public function index()
	{
        $banner = $this->bannerService->getBannerData();
        $hero = Hero::first();
        $module = Module::latest()->first();
        $slider = $this->sliderService->getSliderData();
        $testimonials = $this->testimonialService->getTestimonialData();
        $curtainSizes = $this->curtainSizeService->getAllData();
        $curtainTypes = $this->curtainTypeService->getAllData();
        $timeSlots = $this->availableTimeService->getAllData();
        $bookingStorefront = $this->storefrontService->getLatestData();

        return view('visitor.pages.index', compact('banner','hero','module','slider','testimonials','curtainSizes','curtainTypes','timeSlots','bookingStorefront'));
	}

    public function termsAndCondition()
    {
        $termAndCondition = TermAndCondition::latest()->first();

        return view('visitor.pages.terms-and-condition', compact('termAndCondition'));
    }

    public function privacyPolicy()
    {
        $privacyAndPolicy = PrivacyAndPolicy::latest()->first();

        return view('visitor.pages.privacy-policy', compact('privacyAndPolicy'));
    }

    public function bookingStore(Request $request)
    {

        $request->validate([
            'building_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        DB::beginTransaction();
        try {
            // Step 1: Split the time range
            [$start, $end] = explode(' - ', $request->time);

            // Step 2: Convert to 24-hour format (MySQL TIME)
            $startTime = Carbon::createFromFormat('h:i A', trim($start))->format('H:i:s');
            $endTime = Carbon::createFromFormat('h:i A', trim($end))->format('H:i:s');
            $convertedDate = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');

                // Check for existing record with same date and time range
            $exists = BookingSchedule::where('date', $convertedDate)
                    ->where('start_time', $startTime)
                    ->where('end_time', $endTime)
                    ->exists();

            if ($exists) {
                throw new Exception("This time slot already booked by other customer.");
            }


            $booking = BookingSchedule::create([
                'building_name' => $request->building_name,
                'phone' => $request->phone,
                'date' => $convertedDate,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ]);

            $admin = User::where('username', 'admin')->first();
            if ($admin) {
                $admin->notify(new BookingCreatedNotification($booking));
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();

            return back()->withErrors(['error' => $e->getMessage()]);
        }


        return redirect()->route('home')->with('success', 'Booking schedule created successfully');
    }
}

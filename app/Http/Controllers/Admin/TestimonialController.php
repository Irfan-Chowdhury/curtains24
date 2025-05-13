<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestimonialController extends Controller
{

    protected $testimonialService;

    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }

    public function index()
    {
        $testimonials = $this->testimonialService->getTestimonialData();

        // dd(gettype($testimonials));
        // dd($testimonials[0]->url);

        return view('admin.pages.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'testimonial_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $this->testimonialService->storeData($request);

                $this->setSuccessMessage('Slider created successfully');

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit(Testimonial $testimonial)
    {
        $testimonial = $this->testimonialService->findData($testimonial);

        return response()->json($testimonial);
    }


    public function update(Request $request)
    {
        $request->validate([
            'testimonial_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {

            $this->testimonialService->testimonialImageUpdate($request);

            $this->setSuccessMessage('Testimonial updated successfully');

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            $this->testimonialService->destroy($testimonial);

            $this->setSuccessMessage('Testimonial deleted successfully');

        } catch (Exception $exception) {

            $this->setErrorMessage( $exception->getMessage());
        }

        return redirect()->back();
    }


}

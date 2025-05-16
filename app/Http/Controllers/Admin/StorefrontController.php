<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StorefrontService;
use Exception;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function __construct(private StorefrontService $storefrontService)
    {
    }

    public function bookingStorefrontSetting()
    {
        $bookingStorefront = $this->storefrontService->getLatestData();

        return view('admin.pages.booking-storefront.index', compact('bookingStorefront'));
    }


    public function updateBookingStorefrontSetting(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'booking_heading' => 'required|string|max:255',
            'booking_description' => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',

        ]);

        try {
            $this->storefrontService->updateData($request);

            $this->setSuccessMessage('Data updated successfully');

        } catch (Exception $exception) {

            return back()->withErrors(['error' => $exception->getMessage()]);
        }

        return redirect()->back();

    }
}

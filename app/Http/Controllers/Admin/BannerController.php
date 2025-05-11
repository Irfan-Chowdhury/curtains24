<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\BannerService;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }

        $banner = $this->bannerService->getBannerData();

        return view('admin.pages.banners.index', compact('banner'));
    }


    public function update(Request $request)
	{

        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }

        $this->validate($request, [
            'title' => 'required',
            'banner_image_1' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:100000',
            'banner_image_2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:100000',
        ]);

        // dd($request->all());

        try {
            $this->bannerService->updateData($request);

            $this->setSuccessMessage('Data updated successfully');

        } catch (Exception $e) {
            $this->setErrorMessage( $e->getMessage());
        }

        return redirect()->back();
	}
}

<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Hero;
use App\Models\Module;
use App\Models\PrivacyAndPolicy;
use App\Models\TermAndCondition;
use App\Services\BannerService;
use App\Services\SettingService;
use App\Services\SliderService;

class HomeController
{
    private $settingService;
    private $bannerService;
    private $sliderService;
    public function __construct(SettingService $settingService, BannerService $bannerService, SliderService $sliderService)
    {
        $this->settingService = $settingService;
        $this->bannerService = $bannerService;
        $this->sliderService = $sliderService;
    }

	public function index()
	{
        $banner = $this->bannerService->getBannerData();
        $hero = Hero::first();
        $module = Module::latest()->first();
        $slider = $this->sliderService->getSliderData();
        return view('visitor.pages.index', compact('banner','hero','module','slider'));
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
}

<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Hero;
use App\Models\Module;
use App\Models\PrivacyAndPolicy;
use App\Models\TermAndCondition;
use App\Services\BannerService;
use App\Services\SettingService;
use App\Services\SliderService;
use App\Services\TestimonialService;

class HomeController
{
    private $settingService;
    private $bannerService;
    private $sliderService;
    private $testimonialService;

    public function __construct(SettingService $settingService, BannerService $bannerService, SliderService $sliderService, TestimonialService $testimonialService)
    {
        $this->settingService = $settingService;
        $this->bannerService = $bannerService;
        $this->sliderService = $sliderService;
        $this->testimonialService = $testimonialService;
    }

	public function index()
	{
        $banner = $this->bannerService->getBannerData();
        $hero = Hero::first();
        $module = Module::latest()->first();
        $slider = $this->sliderService->getSliderData();
        $testimonials = $this->testimonialService->getTestimonialData();
        return view('visitor.pages.index', compact('banner','hero','module','slider','testimonials'));
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

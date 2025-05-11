<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Hero;
use App\Models\Module;
use App\Models\PrivacyAndPolicy;
use App\Models\TermAndCondition;
use App\Services\BannerService;
use App\Services\SettingService;

class HomeController
{
    private $settingService;
    private $bannerService;
    public function __construct(SettingService $settingService, BannerService $bannerService)
    {
        $this->settingService = $settingService;
        $this->bannerService = $bannerService;
    }

	public function index()
	{
        $banner = $this->bannerService->getBannerData();
        $hero = Hero::first();
        $module = Module::latest()->first();

        return view('visitor.pages.index', compact('banner','hero','module'));
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

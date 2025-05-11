<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Hero;
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
        // $generalSetting = $this->settingService->getGeneralSettingData();
        $banner = $this->bannerService->getBannerData();
        $hero = Hero::first();


        return view('visitor.pages.index', compact('banner','hero'));
	}

    public function termsAndCondition()
    {
        return view('visitor.pages.terms-and-condition');
    }

    public function privacyPolicy()
    {
        return view('visitor.pages.privacy-policy');
    }
}

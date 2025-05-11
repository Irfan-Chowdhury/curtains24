<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Hero;
use App\Models\Module;
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
        return view('visitor.pages.terms-and-condition');
    }

    public function privacyPolicy()
    {
        return view('visitor.pages.privacy-policy');
    }
}

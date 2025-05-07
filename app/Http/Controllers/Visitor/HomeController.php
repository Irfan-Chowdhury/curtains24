<?php

namespace App\Http\Controllers\Visitor;

use App\Services\SettingService;

class HomeController
{
    private $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

	public function index()
	{
        // $generalSetting = $this->settingService->getGeneralSettingData();


        return view('visitor.pages.index');
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

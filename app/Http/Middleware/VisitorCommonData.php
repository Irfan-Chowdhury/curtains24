<?php

namespace App\Http\Middleware;

use App\Services\SettingService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorCommonData
{
    private $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function handle(Request $request, Closure $next)
    {
        $generalSetting = $this->settingService->getGeneralSettingData();

        view()->composer([
            'visitor.partials.navbar',
            'visitor.partials.footer',
        ], function ($view) use (
                $generalSetting,
        ) {
            $view->with([
                'generalSetting' => $generalSetting,
            ]);
        });

        return $next($request);
    }
}

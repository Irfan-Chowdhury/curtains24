<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ModuleController;
use Illuminate\Support\Facades\Auth;




Auth::routes(['register' => false]);


Route::group(['middleware' => ['XSS','auth']], function ()  {

    Route::prefix('admin')->group(function () {

        Route::group(['as' => 'admin.'], function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        });

        Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
        Route::post('/banners/update', [BannerController::class, 'update'])->name('banners.update');

        Route::get('/hero-section', [HeroController::class, 'index'])->name('hero-section.index');
        Route::post('/hero-section/update', [HeroController::class, 'update'])->name('hero-section.update');

        Route::prefix('settings')->group(function ()  {
            Route::post('general_settings/update/{id}', [GeneralSettingController::class, 'update'])->name('general_settings.update');
            Route::resource('general_settings', GeneralSettingController::class)->except(['create', 'edit', 'show', 'update']);
        });

        Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
        Route::post('/modules/update', [ModuleController::class, 'update'])->name('modules.update');

    });




});



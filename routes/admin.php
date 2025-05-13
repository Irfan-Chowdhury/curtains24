<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PrivacyAndPolicyController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TermAndConditionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Middleware\XSS;
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

        Route::get('/term-and-conditions', [TermAndConditionController::class, 'index'])->name('term-and-conditions.index')->withoutMiddleware([XSS::class]);
        Route::post('/term-and-conditions/update', [TermAndConditionController::class, 'update'])->name('term-and-conditions.update')->withoutMiddleware([XSS::class]);

        Route::get('/privacy-and-policy', [PrivacyAndPolicyController::class, 'index'])->name('privacy-and-policy.index')->withoutMiddleware([XSS::class]);
        Route::post('/privacy-and-policy/update', [PrivacyAndPolicyController::class, 'update'])->name('privacy-and-policy.update')->withoutMiddleware([XSS::class]);

        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::post('/sliders/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/sliders/edit/{slider}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/sliders/update', [SliderController::class, 'update'])->name('sliders.update');
        Route::get('/sliders/destroy/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::post('/testimonials/update', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::get('/testimonials/destroy/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
    });




});



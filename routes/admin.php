<?php

use App\Http\Controllers\Admin\AvailableTimeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookingScheduleController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CurtainSizeController;
use App\Http\Controllers\Admin\CurtainTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PrivacyAndPolicyController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StorefrontController;
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


        Route::prefix('curtains')->group(function ()  {
            Route::prefix('sizes')->group(function ()  {
                Route::get('/', [CurtainSizeController::class, 'index'])->name('curtains.size.index');
                Route::post('/store', [CurtainSizeController::class, 'store'])->name('curtains.size.store');
                Route::get('/edit/{curtainSize}', [CurtainSizeController::class, 'edit'])->name('curtains.size.edit');
                Route::post('/update', [CurtainSizeController::class, 'update'])->name('curtains.size.update');
                Route::get('/destroy/{curtainSize}', [CurtainSizeController::class, 'destroy'])->name('curtains.size.destroy');
            });

            Route::prefix('types')->group(function ()  {
                Route::get('/', [CurtainTypeController::class, 'index'])->name('curtains.types.index');
                Route::post('/store', [CurtainTypeController::class, 'store'])->name('curtains.types.store');
                Route::get('/edit/{curtainType}', [CurtainTypeController::class, 'edit'])->name('curtains.types.edit');
                Route::post('/update', [CurtainTypeController::class, 'update'])->name('curtains.types.update');
                Route::get('/destroy/{curtainType}', [CurtainTypeController::class, 'destroy'])->name('curtains.types.destroy');
            });
        });

        Route::prefix('booking-management')->group(function ()  {
            Route::prefix('available-times')->group(function ()  {
                Route::get('/', [AvailableTimeController::class, 'index'])->name('available-times.index');
                Route::post('/store', [AvailableTimeController::class, 'store'])->name('available-times.store');
                Route::get('/edit/{availableTime}', [AvailableTimeController::class, 'edit'])->name('available-times.edit');
                Route::post('/update', [AvailableTimeController::class, 'update'])->name('available-times.update');
                Route::get('/destroy/{availableTime}', [AvailableTimeController::class, 'destroy'])->name('available-times.destroy');
            });

            Route::prefix('storefront-setting')->group(function ()  {
                Route::get('/', [StorefrontController::class, 'bookingStorefrontSetting'])->name('booking-storefront-setting.index');
                Route::post('/update', [StorefrontController::class, 'updateBookingStorefrontSetting'])->name('booking-storefront-setting.update');
            });

            Route::get('/booking-schedule', [BookingScheduleController::class, 'index'])->name('booking-schedule.index');
            Route::get('/booking-schedule/destroy/{bookingSchedule}', [BookingScheduleController::class, 'destroy'])->name('booking-schedule.destroy');
        });

        Route::prefix('contact-us')->group(function ()  {
            Route::get('/settings', [ContactUsController::class, 'index'])->name('contact-us-setting.index');
            Route::post('/settings/update', [ContactUsController::class, 'update'])->name('contact-us-setting.update');
            Route::get('/messages', [ContactUsController::class, 'messages'])->name('contact-us-messages.index');
            Route::get('/messages/show/{contact}', [ContactUsController::class, 'show'])->name('contact-us-messages.show');
        });




    });




});



<?php

use App\Http\Controllers\Visitor\HomeController;



Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('visitorCommonData');
Route::get('/terms-and-conditions', [HomeController::class, 'termsAndCondition'])->name('termsAndCondition')->middleware('visitorCommonData');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy')->middleware('visitorCommonData');
Route::post('/booking', [HomeController::class, 'bookingStore'])->name('bookingStore');

Route::post('/contact-us/send', [HomeController::class, 'contactUsSend'])->name('contactUsSend');
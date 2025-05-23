<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoAutoUpdateController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


// Fetch data from Demo
// Route::get('fetch-data-general', 'DemoAutoUpdateController@fetchDataGeneral')->name('fetch-data-general');
// Route::get('fetch-data-upgrade', 'DemoAutoUpdateController@fetchDataForAutoUpgrade')->name('data-read');
// Route::get('fetch-data-bugs', 'DemoAutoUpdateController@fetchDataForBugs')->name('fetch-data-bugs');

// Route::get('fetch-data-general', [DemoAutoUpdateController::class, 'fetchDataGeneral'])->name('fetch-data-general');
// Route::get('fetch-data-upgrade', [DemoAutoUpdateController::class, 'fetchDataForAutoUpgrade'])->name('data-read');
// Route::get('fetch-data-bugs', [DemoAutoUpdateController::class, 'fetchDataForBugs'])->name('fetch-data-bugs');

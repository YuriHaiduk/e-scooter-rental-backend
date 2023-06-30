<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth;
use \App\Http\Controllers\Api\V1\Scooter;
use \App\Http\Controllers\Api\V1\Driving;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('scooters', Scooter\IndexController::class);

    Route::get('drivings', Driving\IndexController::class);
    Route::get('drivings/history', Driving\HistoryController::class);
    Route::post('drivings/start', Driving\StartController::class);
    Route::get('drivings/{driving}', Driving\ShowController::class);
    Route::put('drivings/{driving}', Driving\StopController::class);

    Route::post('auth/logout', Auth\LogoutController::class);
});

Route::post('auth/register', Auth\RegisterController::class);
Route::post('auth/login', Auth\LoginController::class);

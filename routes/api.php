<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RealTimeController;
use App\Http\Controllers\Api\TrendingController;
use App\Http\Controllers\Api\UserGuideController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('trendings', TrendingController::class);
Route::apiResource('userGuide', UserGuideController::class);
Route::apiResource('realTime', RealTimeController::class);


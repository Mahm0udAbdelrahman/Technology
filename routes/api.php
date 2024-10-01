<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FAQController;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\RealTimeController;
use App\Http\Controllers\Api\TrendingController;
use App\Http\Controllers\Api\TutorialController;
use App\Http\Controllers\Api\UserGuideController;
use App\Http\Controllers\Api\DataMangmentController;
use App\Http\Controllers\Api\DataInsightController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\ChartController;

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
Route::apiResource('faq', FAQController::class);
Route::apiResource('table', TableController::class);
Route::apiResource('tutorial', TutorialController::class);
Route::apiResource('contact', ContactController::class);
Route::apiResource('chart', ChartController::class);
Route::apiResource('technology', TechnologyController::class);
Route::apiResource('DataInsight', DataInsightController::class);


Route::apiResource('data-mangment', DataMangmentController::class);
Route::patch('data-mangment/{id}/restore/get', [DataMangmentController::class,'restore']);
Route::get('data-mangment/showDelete/get', [DataMangmentController::class,'ShowDelete']);
Route::delete('data-mangment/{id}/forcedelete/delete', [DataMangmentController::class,'force']);
Route::patch('/data-mangment/restore-multiple/get', [DataMangmentController::class, 'restoreMultiple']);  
Route::delete('/data-mangment/force-delete-multiple/destory', [DataMangmentController::class, 'forceDeleteMultiple']);  




Route::get('countTrendings',[TrendingController::class,'count']);


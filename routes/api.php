<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NationalityController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SelectMenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('user')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('attributes',[AuthController::class,'storeAttributes'])->middleware('auth:sanctum');
    Route::post('login',[AuthController::class,'login']);
    Route::post('update-fcmtoken',[AuthController::class,'updateFcmToken'])->middleware('auth:sanctum');
    Route::post('search',[SearchController::class,'search']);
    
    Route::get('list/nationalities',[NationalityController::class,'nationalityList']);
    Route::get('list/countries',[SelectMenuController::class,'countryList']);
    Route::get('list/cities/{id}',[SelectMenuController::class,'cityList']);
});
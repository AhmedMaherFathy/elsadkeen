<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\SelectMenuController;
use App\Http\Controllers\Api\UserLikeController;
use App\Http\Controllers\Api\NationalityController;
use App\Http\Controllers\Api\SupportChatController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\SettingController;

Route::get('/user', function (Request $request) {
    return view('forget-password-otp');
});

Route::prefix('user')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::prefix('forget-password')->group(function () {
        Route::post('/', [ForgetPasswordController::class, 'SendOtp']);         
        Route::post('verify', [ForgetPasswordController::class, 'verifyOtp']);  
        Route::post('reset-password', [ForgetPasswordController::class, 'resetPassword']);  
    });
    Route::post('attributes',[AuthController::class,'storeAttributes'])->middleware('auth:sanctum');
    Route::post('update-fcmtoken',[AuthController::class,'updateFcmToken'])->middleware('auth:sanctum');
    Route::post('search',[SearchController::class,'search']);
    Route::get('profile',[AuthController::class,'getProfile'])->middleware('auth:sanctum');

    Route::get('list/nationalities',[NationalityController::class,'nationalityList']);
    Route::get('list/countries',[SelectMenuController::class,'countryList']);
    Route::get('list/cities/{id}',[SelectMenuController::class,'cityList']);

    Route::post('support-messages',[SupportChatController::class,'sendMessage'])->middleware('auth:sanctum');
    Route::get('support-messages',[SupportChatController::class,'getMessages'])->middleware('auth:sanctum');

    Route::get('/like/user/{id}', [UserLikeController::class, 'likeUser'])->middleware('auth:sanctum');
    Route::get('/like/list', [UserLikeController::class, 'myFavoriteUsers'])->middleware('auth:sanctum');

    Route::get('/blogs',[BlogController::class,'index']);

    Route::get('/aboutUs',[SettingController::class,'aboutUs']);
});
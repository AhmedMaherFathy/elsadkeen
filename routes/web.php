<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdminForgetPassword;
use App\Http\Controllers\Dashboard\SupportChatController;
use App\Http\Controllers\Dashboard\SuccessStoryController;


Route::get('dashboard/login', function () {
    return view('dashboard.login');
})->name('dashboard.login');

Route::get('/', function () {
    // return view('forget-password-otp');
    return view('welcome');
});

Route::post('login', [AuthController::class, 'login'])->name('dashboard.signin');
Route::get('dashboard/password/request', [AdminForgetPassword::class, 'showForgetForm'])->name('dashboard.password.request');
Route::post('dashboard/password/send-otp', [AdminForgetPassword::class, 'sendOtp'])->name('admin.send.otp');
Route::get('dashboard/password/verify', [AdminForgetPassword::class, 'showVerifyForm'])->name('admin.verify.form');
Route::post('dashboard/password/verify', [AdminForgetPassword::class, 'verifyOtp'])->name('admin.verify.otp');
Route::get('dashboard/password/reset', [AdminForgetPassword::class, 'showResetForm'])->name('admin.reset.form');
Route::post('dashboard/password/reset', [AdminForgetPassword::class, 'resetPassword'])->name('admin.reset.password');

Route::prefix('dashboard')->middleware('admin.auth')->group(function () {

    Route::prefix('admins')->group(function(){
        Route::get('/', [AdminController::class, 'index'])
            ->middleware('permission:view users,admin')
            ->name('dashboard.admin.index');

        Route::get('/create', [AdminController::class, 'create'])
            ->name('dashboard.admin.create');

        Route::post('/store', [AdminController::class, 'store'])
            ->name('dashboard.admin.store');

        Route::get('/show/{id}', [AdminController::class, 'show'])
            ->name('dashboard.admin.show');

        Route::get('/edit/{id}', [AdminController::class, 'edit'])
            ->name('dashboard.admin.edit');

        Route::put('/update/{admin}', [AdminController::class, 'update'])
            ->name('dashboard.admin.update');

        Route::delete('/delete/{id}', [AdminController::class, 'destroy'])
            ->name('dashboard.admin.delete');

        Route::post('logout',[AuthController::class,'logout'])
            ->name('dashboard.logout');

        });

        Route::prefix('success-stories')->as('dashboard.success_stories.')->group(function(){
            Route::get('',[SuccessStoryController::class,'index'])->name('index');
            Route::get('show/{id}',[SuccessStoryController::class,'show'])->name('show');
            Route::get('create',[SuccessStoryController::class,'create'])->name('create');
            Route::post('store',[SuccessStoryController::class,'store'])->name('store');
            Route::get('edit/{id}',[SuccessStoryController::class,'edit'])->name('edit');
            Route::put('update/{id}',[SuccessStoryController::class,'update'])->name('update');
            Route::delete('delete/{id}',[SuccessStoryController::class,'destroy'])->name('delete');
            Route::get('change-published-status/{id}',[SuccessStoryController::class,'changePublishedStatus'])->name('change_published_status');
        });

        Route::prefix('blogs')->as('dashboard.blogs.')->group(function(){
            Route::get('',[BlogController::class,'index'])->name('index');
            // Route::get('show/{id}',[BlogController::class,'show'])->name('show');
            Route::get('create',[BlogController::class,'create'])->name('create');
            Route::post('store',[BlogController::class,'store'])->name('store');
            Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
            Route::put('update/{id}',[BlogController::class,'update'])->name('update');
            Route::delete('delete/{id}',[BlogController::class,'destroy'])->name('delete');
            Route::get('change-published-status/{id}',[BlogController::class,'changePublishedStatus'])->name('change_published_status');
        });

        Route::prefix('support-chats')->name('dashboard.support_chats.')->group(function(){
        
            Route::get('/', [SupportChatController::class, 'index'])
                ->name('index');

            Route::get('/{id}', [SupportChatController::class, 'show'])
                ->name('show');

            Route::post('/{userId}/reply', [SupportChatController::class, 'adminReply'])
                ->name('reply');

        });
});

// Route::get('dashoard');
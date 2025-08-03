<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard/login', function () {
    return view('dashboard.login');
})->name('dashboard.login');
Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'login'])->name('dashboard.signin');

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
            Route::get('',[BlogController::class,'index'])->name('index');
            Route::get('show/{id}',[BlogController::class,'show'])->name('show');
            Route::get('create',[BlogController::class,'create'])->name('create');
            Route::post('store',[BlogController::class,'store'])->name('store');
            Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
            Route::put('update/{id}',[BlogController::class,'store'])->name('update');
            Route::delete('delete/{id}',[BlogController::class,'delete'])->name('delete');
        });
});

// Route::get('dashoard');
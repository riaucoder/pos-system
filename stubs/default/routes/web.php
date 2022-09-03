<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::group(['prefix' => 'register'], function (){
        Route::get('/', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
        Route::post('/', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
    });
    Route::group(['prefix' => 'login'], function (){
        Route::get('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    });
    Route::group(['as' => 'password.'], function (){
        Route::get('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('request');
        Route::post('forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('email');
        Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('reset');
        Route::post('reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('update');
    });
});

Route::middleware(['auth'])->group(function (){
    Route::middleware(['verified', 'password.confirm'])->group(function (){
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function (){
            Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
        });
    });

    // Authenticate Route
    Route::group(['as' => 'verification.'], function (){
        Route::get('verify-email/', [\App\Http\Controllers\Auth\EmailVerificationPromptController::class, '__invoke'])->name('notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('send');
    });

    Route::group(['prefix' => 'confirm-password'], function (){
        Route::get('/', [\App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/', [\App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'store']);
    });

    Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

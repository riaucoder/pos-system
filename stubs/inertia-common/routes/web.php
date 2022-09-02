<?php


use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function (){
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';

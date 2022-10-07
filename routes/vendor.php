<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\Auth\LoginController;

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'login'])->name('vendor.login.submit');

    Route::middleware(['auth:vendor'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('vendor.dashboard');

        Route::post('logout/', [LoginController::class, 'logout'])->name('vendor.logout');
    });

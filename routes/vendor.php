<?php

use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\CustomerController;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\Auth\LoginController;

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'login'])->name('vendor.login.submit');

    Route::middleware(['auth:vendor'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('vendor.dashboard');

        //Order
        Route::resource('orders', OrderController::class);
        Route::get('get-delivery-charge/{destination_id}',[OrderController::class,'getDeliveryCharge'])->name('get.delivery.charge');

        //Customer
        Route::get('customers-index',[CustomerController::class,'index'])->name('customers.index');

        Route::post('logout/', [LoginController::class, 'logout'])->name('vendor.logout');
    });

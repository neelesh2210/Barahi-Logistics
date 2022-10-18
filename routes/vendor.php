<?php

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\CustomerController;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\Vendor\OrderCommentController;

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'login'])->name('vendor.login.submit');

    Route::middleware(['auth:vendor'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('vendor.dashboard');

        //Order
        Route::resource('orders', OrderController::class);
        Route::get('get-delivery-charge/{destination_id}',[OrderController::class,'getDeliveryCharge'])->name('get.delivery.charge');
        Route::post('additional-info/{order_id}',[OrderController::class,'additionalInfo'])->name('additional.info');

        //Order Comment
        Route::resource('order-comments',OrderCommentController::class);
        //Customer
        Route::get('customers-index',[CustomerController::class,'index'])->name('customers.index');

        //Notice
        Route::get('vendor-notices-index',[NoticeController::class,'vendorNoticesIndex'])->name('vendor.notices.index');
        Route::get('vendor-notices-show/{id}',[NoticeController::class,'vendorNoticesShow'])->name('vendor.notices.show');

        Route::post('logout/', [LoginController::class, 'logout'])->name('vendor.logout');
    });

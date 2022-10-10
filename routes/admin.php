<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DestinationWithChargeController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    //Vendor
    Route::resource('vendors', VendorController::class);

    //Destination With Charge
    Route::resource('destination-with-charges', DestinationWithChargeController::class);

    //Branch
    Route::resource('branches', BranchController::class);

    Route::post('logout/', [LoginController::class, 'logout'])->name('admin.logout');
});

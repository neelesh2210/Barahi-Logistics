<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AssignOrderController;
use App\Http\Controllers\Admin\DeliveryBoyController;
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

    //Order
    Route::get('orders-index',[OrderController::class,'index'])->name('admin.orders.index');
    Route::get('orders-show/{id}',[OrderController::class,'show'])->name('admin.orders.show');
    Route::get('orders-status/{id}/{status}',[OrderController::class,'ordersStatus'])->name('admin.orders.status');

    //Payment
    Route::get('payment-index',[PaymentController::class,'index'])->name('admin.payment.index');
    Route::get('payment-create',[PaymentController::class,'create'])->name('admin.payment.create');
    Route::post('payment-store',[PaymentController::class,'store'])->name('admin.payment.store');
    Route::get('get-vendor-orders/{vendor_id}',[PaymentController::class,'getVendorOrders'])->name('admin.get.vendor.orders');
    Route::get('generate-invoice/{payment_id}',[PaymentController::class,'generateInvoice'])->name('admin.generate.invoice');

    //Notice
    Route::resource('admin-notices', NoticeController::class)->except('destroy');
    Route::get('admin-notices.destroy/{id}',[NoticeController::class,'destroy'])->name('admin-notices.destroy');

    //Ticket
    Route::get('ticket-index', [TicketController::class,'index'])->name('admin.ticket.index');
    Route::get('ticket-status/{id}/{status}', [TicketController::class,'status'])->name('admin.ticket.status');
    Route::get('ticket-reply/{ticket_id}', [TicketController::class,'replyIndex'])->name('admin.ticket.reply.index');

    //Delivery Boy
    Route::resource('delivery-boys', DeliveryBoyController::class);

    //Assign Order
    Route::resource('assign-order',AssignOrderController::class,['as'=>'admin']);
    Route::get('get-assign-delivery-boy-orders',[AssignOrderController::class,'getAssignDeliveryBoyOrders'])->name('get.assign.delivery.boy.orders');

    Route::post('logout/', [LoginController::class, 'logout'])->name('admin.logout');
});

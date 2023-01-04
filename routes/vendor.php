<?php

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\TicketController;
use App\Http\Controllers\Vendor\PaymentController;
use App\Http\Controllers\Vendor\CustomerController;
use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\Auth\LoginController;
use App\Http\Controllers\Vendor\TicketReplyController;
use App\Http\Controllers\Vendor\OrderCommentController;

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('login', [LoginController::class, 'login'])->name('vendor.login.submit');

    Route::middleware(['auth:vendor'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('vendor.dashboard');

        //Order
        Route::resource('orders', OrderController::class);
        Route::get('get-delivery-charge/{destination_id}',[OrderController::class,'getDeliveryCharge'])->name('get.delivery.charge');
        Route::post('additional-info/{order_id}',[OrderController::class,'additionalInfo'])->name('additional.info');
        Route::get('view-bulk-order',[OrderController::class,'bulkOrderView'])->name('admin.view.bulk.order');
        Route::post('store-bulk-order',[OrderController::class,'import'])->name('admin.store.bulk.order');

        //Order Comment
        Route::resource('order-comments',OrderCommentController::class);

        //Customer
        Route::get('customers-index',[CustomerController::class,'index'])->name('customers.index');

        //Payment
        Route::get('payment-index',[PaymentController::class,'index'])->name('vendor.payment.index');
        Route::get('generate-invoice/{payment_id}',[PaymentController::class,'generateInvoice'])->name('vendor.generate.invoice');

        //Notice
        Route::get('vendor-notices-index',[NoticeController::class,'vendorNoticesIndex'])->name('vendor.notices.index');
        Route::get('vendor-notices-show/{id}',[NoticeController::class,'vendorNoticesShow'])->name('vendor.notices.show');

        //Ticket
        Route::get('tickets-index', [TicketController::class,'index'])->name('vendor.ticket.index');
        Route::get('tickets-create', [TicketController::class,'create'])->name('vendor.ticket.create');
        Route::post('tickets-store', [TicketController::class,'store'])->name('vendor.ticket.store');

        //Ticket Reply
        Route::get('tickets-reply-index/{ticket_id}', [TicketReplyController::class,'index'])->name('vendor.ticket.reply.index');
        Route::post('tickets-reply-store', [TicketReplyController::class,'store'])->name('vendor.ticket.reply.store');

        //Order Comment
        Route::get('vendor-order-comment',[OrderCommentController::class,'index'])->name('vendor.order.comment');
        Route::post('logout/', [LoginController::class, 'logout'])->name('vendor.logout');
    });

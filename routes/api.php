<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeliveryBoyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Delivery Boy Login
Route::post('delivery-boy-login',[DeliveryBoyController::class,'deliveryBoyLogin'])->name('delivery.boy.login');

Route::middleware('auth:sanctum')->group( function () {

    //Delivery Boy Orders
    Route::post('delivery-boy-orders',[DeliveryBoyController::class,'deliveryBoyOrder'])->name('delivery.boy.orders');
    Route::post('delivery-boy-status-change',[DeliveryBoyController::class,'deliveryBoyStatusChange'])->name('delivery.boy.status.change');

});


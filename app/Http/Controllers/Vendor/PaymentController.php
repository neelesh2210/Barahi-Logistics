<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use Illuminate\Http\Request;
use App\Models\Admin\Payment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','desc')->paginate(10);

        return view('vendor.payment.index',compact('payments'));
    }

    public function generateInvoice($payment_id)
    {
        $payment = Payment::where('id',$payment_id)->first();
        $order_ids = json_decode($payment->order_ids);

        return view('admin.payment.invoice',compact('order_ids','payment'));

    }

}

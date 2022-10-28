<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Payment;
use App\Models\Vendor\Vendor;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::orderBy('id','desc')->paginate(10);

        return view('admin.payment.index',compact('payments'));
    }

    public function create()
    {
        $vendors = Vendor::orderBy('name','asc')->get();
        return view('admin.payment.create',compact('vendors'));
    }

    public function store(Request $request)
    {
        $tran_id = Payment::latest()->first();
        if($tran_id)
        {
            $transfer_id = $tran_id->transfer_id+1;
        }
        else
        {
            $transfer_id = 100001;
        }
        $payment = new Payment;
        $payment->transfer_id = $transfer_id;
        $payment->vendor_id = $request->vendor_id;
        $payment->order_ids = json_encode($request->order_ids);
        $payment->cod_amount = array_sum($request->cod_amount);
        $payment->delivery_charge = array_sum($request->delivery_charge);
        $payment->total_amount = array_sum($request->cod_amount) - array_sum($request->delivery_charge);
        $payment->collection_mode = 'cash';
        $payment->save();

        foreach($request->order_ids as $order_id)
        {
            $order = Order::find($order_id);
            $order->payment_collection = 'completed';
            $order->save();
        }

        return redirect()->route('admin.payment.index')->with('success','Payment Successfully!');
    }

    public function getVendorOrders($vendor_id)
    {
        $orders = Order::where('added_by',$vendor_id)->where('payment_collection','pending')->where('order_status','delivered')->get();

        return view('admin.payment.order_table',compact('orders'));
    }

}

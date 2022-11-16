<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Payment;
use App\Models\Vendor\Vendor;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $payments = Payment::orderBy('id','desc');

        if($request->search)
        {
            $order_id = Order::where('order_id',$request->search)->first();

            $payments=$payments->whereJsonContains('order_ids', ''.optional($order_id)->id);
        }
        if(!empty($request->date_range))
        {
            $dates=explode('-',$request->date_range);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $date=$dates[0].' - '.$dates[1];
            $payments=$payments->whereBetween('created_at', [$startDate, $endDate]);
        }
        $payments=$payments->paginate(10);
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

    public function generateInvoice($payment_id)
    {
        $payment = Payment::where('id',$payment_id)->first();
        $order_ids = json_decode($payment->order_ids);

        return view('admin.payment.invoice',compact('order_ids','payment'));

    }

}

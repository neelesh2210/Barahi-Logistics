<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Admin\Payment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        $payments = Payment::where('vendor_id',Auth::guard('vendor')->user()->id);
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
        $payments=$payments->orderBy('id','desc')->paginate(10);
        return view('vendor.payment.index',compact('payments'));
    }

    public function generateInvoice($payment_id)
    {
        $payment = Payment::where('id',$payment_id)->first();
        $order_ids = json_decode($payment->order_ids);

        return view('admin.payment.invoice',compact('order_ids','payment'));

    }

}

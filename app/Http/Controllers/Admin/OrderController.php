<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders=Order::orderBy('id','desc');

        if($request->source)
        {
            $orders=$orders->where('branch_id',$request->source);
        }
        if($request->destination)
        {
            $orders=$orders->where('destination_id',$request->destination);
        }
        if($request->status)
        {
            $orders=$orders->where('order_status',$request->status);
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
            $orders=$orders->whereBetween('created_at', [$startDate, $endDate]);
        }
        $orders=$orders->paginate(10);

        return view('admin.order.index',compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.order.show',compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function ordersStatus($id,$status)
    {
        $order = Order::find($id);
        $order->order_status = $status;

        $order_status_date=json_decode($order->order_status_date);
        array_push($order_status_date,[$status=>date('d-m-y H:i')]);

        $order->order_status_date = $order_status_date;
        $order->save();
    }
}

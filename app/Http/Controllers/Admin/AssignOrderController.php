<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Admin\AssignOrder;
use App\Models\Admin\DeliveryBoy;
use App\Http\Controllers\Controller;

class AssignOrderController extends Controller
{
    public function index(Request $request)
    {
        $assign_orders = AssignOrder::groupBy('assign_id')->orderBy('id','desc');

        if($request->search)
        {
            $order_id = Order::where('order_id',$request->search)->first();

            $assign_orders=$assign_orders->where('order_id',optional($order_id)->id);
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
            $assign_orders=$assign_orders->whereBetween('created_at', [$startDate, $endDate]);
        }
        $assign_orders=$assign_orders->paginate(10);
        return view('admin.assign_order.index',compact('assign_orders'));
    }

    public function create()
    {
        $delivery_boys = DeliveryBoy::orderBy('name','asc')->get();
        return view('admin.assign_order.create',compact('delivery_boys'));
    }

    public function store(Request $request)
    {
        $assg_id = AssignOrder::latest()->first();
        if($assg_id)
        {
            $assign_id = $assg_id->assign_id+1;
        }
        else
        {
            $assign_id = 100001;
        }


        foreach($request->order_ids as $order_id)
        {
            $assign_order = new AssignOrder;
            $assign_order->assign_id = $assign_id;
            $assign_order->delivery_boy_id = $request->delivery_boy;
            $assign_order->order_id = $order_id;
            $assign_order->save();
            
            $order = Order::find($order_id);
            $order->order_status = 'sent_for_delivery';
            $order->save();
        }

        return redirect()->route('admin.assign-order.index')->with('success','Order Assign Successfully!');
    }

    public function getAssignDeliveryBoyOrders()
    {
        $orders = Order::where('order_status','pickup_complete')->orWhere('order_status','returned_to_warehouse')->get();

        return view('admin.payment.order_table',compact('orders'));
    }
}

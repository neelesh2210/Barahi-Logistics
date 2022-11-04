<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $drop_off_order_created = Order::where('order_status','drop_off_order_created')->get()->count();
        $pickup_order_created = Order::where('order_status','pickup_order_created')->get()->count();
        $sent_for_pickup = Order::where('order_status','sent_for_pickup')->get()->count();
        $pickup_complete = Order::where('order_status','pickup_complete')->get()->count();
        $dispatched = Order::where('order_status','dispatched')->get()->count();
        $rtv_dispatched = Order::where('order_status','rtv_dispatched')->get()->count();
        $arrived = Order::where('order_status','arrived')->get()->count();
        $rtv_arrived = Order::where('order_status','rtv_arrived')->get()->count();
        $sent_for_delivery = Order::where('order_status','sent_for_delivery')->get()->count();
        $returned_to_warehouse = Order::where('order_status','returned_to_warehouse')->get()->count();
        $sent_to_vendor = Order::where('order_status','sent_to_vendor')->get()->count();
        $hold = Order::where('order_status','hold')->get()->count();
        $order_statuses = [$drop_off_order_created,$pickup_order_created,$sent_for_pickup,$pickup_complete,$dispatched,$rtv_dispatched,$arrived,$rtv_arrived,$sent_for_delivery,$returned_to_warehouse,$sent_to_vendor,$hold];

        $last_15_days = [];

        for($i=1;$i<=15;$i++)
        {
            array_push($last_15_days,Carbon::now()->addDays(1)->subDays($i)->format("Y-m-d"));
        }
        $last_15_days = array_reverse($last_15_days);

        $daily_packets=[];
        $daily_packet_values=[];
        foreach($last_15_days as $last_15_day)
        {
            $daily_packet = Order::whereDate('created_at',$last_15_day)->get()->count();
            $daily_packet_value = Order::whereDate('created_at',$last_15_day)->get()->sum('delivery_charge') + Order::whereDate('created_at',$last_15_day)->get()->sum('cod_charge');
            array_push($daily_packets,$daily_packet);
            array_push($daily_packet_values,$daily_packet_value);
        }
        return view('admin.dashboard',compact('order_statuses','last_15_days','daily_packets','daily_packet_values'));
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
        //
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
}

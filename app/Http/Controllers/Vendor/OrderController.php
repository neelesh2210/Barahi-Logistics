<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use App\Models\User;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\DestinationWithCharge;

class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::where('added_by',Auth::guard('vendor')->user()->id)->orderBy('id','desc')->paginate(10);

        return view('vendor.order.index',compact('orders'));
    }

    public function create()
    {
        return view('vendor.order.create');
    }

    public function store(Request $request)
    {
        $user = User::where('phone',$request->receiver_phone)->first();
        if(!$user)
        {
            $user = new User;
            $user->name = $request->receiver_name;
            $user->phone = $request->receiver_phone;
            $user->password = Hash::make($request->receiver_phone);
            $user->save();
        }

        $or_id = Order::latest()->first();
        if($or_id)
        {
            $order_id = explode('-',$or_id->order_id)[1]+1;
        }
        else
        {
            $order_id = 100001;
        }

        $order = new Order;
        $order->order_id = 'ORD-'.$order_id;
        $order->added_by = Auth::guard('vendor')->user()->id;
        $order->user_id = $user->id;
        $order->branch_id = $request->branch_id;
        $order->destination_id = $request->destination_id;
        $order->receiver_name = $request->receiver_name;
        $order->receiver_phone = $request->receiver_phone;
        $order->receiver_alt_phone = $request->receiver_alt_phone;
        $order->receiver_address = $request->receiver_address;
        $order->weight = $request->weight;
        $order->delivery_charge = $request->delivery_charge;
        $order->pickup_type = $request->pickup_type;
        $order->cod_charge = $request->cod_charge;
        $order->package_access = $request->package_access;
        $order->package_type = $request->package_type;
        $order->remark = $request->remark;
        $order->order_status = 'order_created';
        $order->save();

        return redirect()->route('orders.index')->with('success','Order Created Successfully!');
    }

    public function show(Order $order)
    {
        return view('vendor.order.show',compact('order'));
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

    public function getDeliveryCharge($destination_id)
    {
        return DestinationWithCharge::where('id',$destination_id)->first();
    }

    public function additionalInfo(Request $request,$order_id)
    {
        Order::where('id',$order_id)->update([
            'priority'=>$request->priority,
            'remark'=>$request->remark,
            'vendor_reference_id'=>$request->vendor_reference_id,
            'delivery_instruction'=>$request->delivery_instruction
        ]);

        return back()->with('success','Additional Info Updated Successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::orderBy('id','desc')->paginate(10);

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
        Order::where('id',$id)->update([
            'order_status'=>$status
        ]);
    }
}

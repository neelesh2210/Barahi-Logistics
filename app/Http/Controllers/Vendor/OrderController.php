<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\DestinationWithCharge;

class OrderController extends Controller
{

    public function index()
    {
        $orders=Order::orderBy('id','desc')->paginate(10);

        return view('vendor.order.index',compact('orders'));
    }

    public function create()
    {
        return view('vendor.order.create');
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

    public function getDeliveryCharge($destination_id)
    {
        return DestinationWithCharge::where('id',$destination_id)->first();
    }
}

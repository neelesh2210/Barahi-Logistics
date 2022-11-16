<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $customers = Order::where('added_by',Auth::guard('vendor')->user()->id)->groupBy('user_id');

        if($request->search)
        {
            $customers = $customers->where('receiver_name',$request->search)->orWhere('receiver_phone',$request->search);
        }
        $customers = $customers->paginate(10);
        return view('vendor.customer.index',compact('customers'));
    }

}

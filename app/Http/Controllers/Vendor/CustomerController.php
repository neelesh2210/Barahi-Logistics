<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Order::where('added_by',Auth::guard('vendor')->user()->id)->groupBy('user_id')->paginate(10);

        return view('vendor.customer.index',compact('customers'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalysisController extends Controller
{

    public function todayDetails(Request $request)
    {
        $orders=Order::whereDate('updated_at',date('Y-m-d'))->orderBy('id','desc');

        if($request->status)
        {
            $orders=$orders->where('order_status',$request->status);
        }

        $orders=$orders->paginate(10);

        return view('admin.analysis.today_details',compact('orders'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Vendor\OrderComment;
use App\Http\Controllers\Controller;

class OrderCommentController extends Controller
{

    public function index(Request $request)
    {
        $order_comments = OrderComment::orderBy('id','desc');

        if($request->search)
        {
            $order_id = Order::where('order_id',$request->search)->first();

            $order_comments=$order_comments->where('order_id',optional($order_id)->id);
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
            $order_comments=$order_comments->whereBetween('created_at', [$startDate, $endDate]);
        }
        $order_comments=$order_comments->paginate(10);
        return view('admin.order_comment.index',compact('order_comments'));
    }

}

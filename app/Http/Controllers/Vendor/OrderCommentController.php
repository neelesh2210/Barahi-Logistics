<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use Carbon\Carbon;
use App\Models\Vendor\Order;
use Illuminate\Http\Request;
use App\Models\Vendor\OrderComment;
use App\Http\Controllers\Controller;

class OrderCommentController extends Controller
{

    public function index(Request $request)
    {
        $order_comments = OrderComment::where('user_id',Auth::guard('vendor')->user()->id);
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
        $order_comments=$order_comments->orderBy('id','desc')->paginate(10);
        return view('vendor.order_comment.index',compact('order_comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        OrderComment::create([
            'order_id'=>$request->order_id,
            'user_type'=>$request->user_type,
            'user_id'=>Auth::guard('vendor')->user()->id,
            'comment_type'=>$request->comment_type,
            'comment'=>$request->comment
        ]);

        return back()->with('success','Comment Added Successfully!');
    }

    public function show(OrderComment $orderComment)
    {
        //
    }

    public function edit(OrderComment $orderComment)
    {
        //
    }

    public function update(Request $request, OrderComment $orderComment)
    {
        //
    }

    public function destroy(OrderComment $orderComment)
    {
        //
    }
}

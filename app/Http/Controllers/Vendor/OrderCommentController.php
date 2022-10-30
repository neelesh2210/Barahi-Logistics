<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use Illuminate\Http\Request;
use App\Models\Vendor\OrderComment;
use App\Http\Controllers\Controller;

class OrderCommentController extends Controller
{

    public function index()
    {
        //
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

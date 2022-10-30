<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Models\Vendor\TicketReply;
use App\Http\Controllers\Controller;

class TicketReplyController extends Controller
{

    public function index($ticket_id)
    {
        $ticket_replies = TicketReply::where('ticket_id',$ticket_id)->orderBy('id','desc')->get();

        return view('vendor.ticket_reply.index',compact('ticket_replies','ticket_id'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $ticket_reply = new TicketReply;
        $ticket_reply->ticket_id = $request->ticket_id;
        $ticket_reply->user_type = $request->user_type;
        $ticket_reply->user_id = $request->user_id;
        $ticket_reply->reply = $request->reply;
        $ticket_reply->save();

        return redirect()->back();
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Vendor\Ticket;
use App\Models\Vendor\TicketReply;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::orderBy('id','desc')->paginate(10);

        return view('admin.ticket.index',compact('tickets'));
    }

    public function status($id, $status)
    {
        Ticket::where('id',$id)->update([
            'status'=>$status
        ]);

        return redirect()->route('admin.ticket.index')->with('success','Status Changed Successfully!');
    }

    public function replyIndex($ticket_id)
    {
        $ticket_replies = TicketReply::where('ticket_id',$ticket_id)->get();
        return view('admin.ticket.reply',compact('ticket_replies','ticket_id'));
    }
}

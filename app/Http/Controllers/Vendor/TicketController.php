<?php

namespace App\Http\Controllers\Vendor;

use Auth;
use Illuminate\Http\Request;
use App\Models\Vendor\Ticket;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('id','desc')->paginate(10);

        return view('vendor.ticket.index',compact('tickets'));
    }

    public function create()
    {
        return view('vendor.ticket.create');
    }

    public function store(Request $request)
    {
        $tic_id = Ticket::latest()->first();
        if($tic_id)
        {
            $ticket_id = explode('-',$tic_id->ticket_id)[1]+1;
        }
        else
        {
            $ticket_id = 100001;
        }
        $ticket = new Ticket;
        $ticket->ticket_id = 'Ticket-'.$ticket_id;
        $ticket->vendor_id = Auth::guard('vendor')->user()->id;
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->save();

        return redirect()->route('vendor.ticket.index')->with('success','Ticket Generated Successfully!');
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

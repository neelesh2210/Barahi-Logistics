@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ticket List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{route('vendor.ticket.create')}}" class="btn btn-primary"><i class="dripicons-plus"></i>Create Ticket</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Ticket List</h4>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ticket ID</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Latest Reply</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tickets as $key=>$ticket)
                                        <tr>
                                            <td>{{($key+1) + ($tickets->currentPage() - 1)*$tickets->perPage()}}</td>
                                            <td>{{$ticket->ticket_id}}</td>
                                            <td>{{$ticket->subject}}</td>
                                            <td>{{$ticket->description}}</td>
                                            <td>{{optional(App\Models\Vendor\TicketReply::where('ticket_id',$ticket->id)->orderBy('id','desc')->first())->reply}}</td>
                                            <td>{{ucfirst($ticket->status)}}</td>
                                            <td class="table-action">
                                                <a href="{{route('vendor.ticket.reply.index',$ticket->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="footable-empty">
                                            <td colspan="11">
                                            <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br><h2>Nothing Found</h2></center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {!! $tickets->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

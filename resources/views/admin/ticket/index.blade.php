@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Ticket List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Ticket List</h3>
                                <div class="card-tools">
                                    <form action="{{route('admin.orders.index')}}">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="key" value="" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ticket ID</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Latest Reply</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>View</th>
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
                                                <td>
                                                    <select name="status" class="form-control select2" id="status_{{$ticket->id}}" onchange="change_status({{$ticket->id}})">
                                                        <option value="generated" @if($ticket->status == 'generated') selected @endif>Generated</option>
                                                        <option value="processing" @if($ticket->status == 'processing') selected @endif>Processing</option>
                                                        <option value="closed" @if($ticket->status == 'closed') selected @endif>Closed</option>
                                                    </select>
                                                </td>
                                                <td>{{$ticket->created_at}}</td>
                                                <td class="table-action">
                                                    <a href="{{route('admin.ticket.reply.index',$ticket->id)}}" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
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
        </section>
    </div>

@endsection

<script>

    function change_status(id)
    {
        var status = $('#status_'+id).val();
        $.get("{{ route('admin.ticket.status', ['','']) }}"+"/"+id+"/"+status,function(data)
        {
            location.reload();
        });
    }

</script>

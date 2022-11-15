@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box">
                            <div class="page-title-left">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Ticket Reply</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid mb-5">
            <div class="row mb-5">
                <div class="col-md-7 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Ticket Reply</h4>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reply</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ticket_replies as $key=>$ticket_reply)
                                            <tr>
                                                <td>{{($key+1)}}</td>
                                                <td>{{$ticket_reply->reply}}</td>
                                                <td>{{$ticket_reply->created_at}}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('vendor.ticket.reply.store')}}" class="needs-validation" novalidate method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="ticket_id" value="{{$ticket_id}}">
                                    <input type="hidden" name="user_type" value="admin">
                                    <input type="hidden" name="user_id" value="{{Auth::guard('admin')->user()->id}}">
                                    <div class="col-md-12 pt-2">
                                        <label class="form-label" for="reply">Reply</label>
                                        <textarea name="reply" id="reply" class="form-control" placeholder="Reply..." required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary" type="submit">Reply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    </div>



@endsection

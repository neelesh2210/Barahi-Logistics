@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Comment List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <form action="{{route('admin.order.comment')}}">
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-3">
                                            <label for="date_range">Date Range</label>
                                            <input type="text" name="date_range" class="form-control float-right" placeholder="Date Range" id="reservation">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="order_id">Order Id</label>
                                            <input type="text" name="search" class="form-control" placeholder="Order Id">
                                        </div>
                                        <div class="col-md-1" style="margin-top: 2%;">
                                            <button class="btn btn-primary">Fillter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Order ID</th>
                                            <th class="text-center">User</th>
                                            <th class="text-center">Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order_comments as $key=>$order_comment)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($order_comments->currentPage() - 1)*$order_comments->perPage()}}</td>
                                                <td class="text-center">{{$order_comment->order->order_id}}</td>
                                                <td class="text-center">
                                                    @if($order_comment->user_type == 'vendor')
                                                        {{App\Models\Vendor\Vendor::where('id',$order_comment->user_id)->first()->name}} ({{App\Models\Vendor\Vendor::where('id',$order_comment->user_id)->first()->phone}})
                                                    @else
                                                        Admin
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$order_comment->comment}}</td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br><h2>Nothing Found</h2></center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {!! $order_comments->links() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

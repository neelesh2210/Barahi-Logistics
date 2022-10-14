@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="dripicons-plus"></i>Add New Order</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Order List</h4>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Destination Branch</th>
                                        <th>Receiver Details</th>
                                        <th>COD Amount</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $key=>$order)
                                        <tr>
                                            <td>{{($key+1) + ($orders->currentPage() - 1)*$orders->perPage()}}</td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->destination_id}}</td>
                                            <td>
                                                <b>Name:</b>{{$order->receiver_name}} <br>
                                                <b>Phone</b>{{$order->receiver_phone}} <br>
                                                <b>Alt Phone</b>{{$order->receiver_alt_phone}} <br>
                                                <b>Alt Phone</b>{{$order->receiver_address}}
                                            </td>
                                            <td>{{$order->cod_charge}}</td>
                                            <td>{{$order->remark}}</td>
                                            <td>{{$order->remark}}</td>
                                            <td class="table-action">
                                                <a href="{{route('orders.show',$order->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

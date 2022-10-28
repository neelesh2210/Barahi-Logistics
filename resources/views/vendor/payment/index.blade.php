@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Payment List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Payment List</h4>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Transfer ID</th>
                                        <th>Amount</th>
                                        <th>Orders</th>
                                        <th>Collection Mode</th>
                                        <th>Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $key=>$payment)
                                        <tr>
                                            <td>{{($key+1) + ($payments->currentPage() - 1)*$payments->perPage()}}</td>
                                            <td>{{$payment->transfer_id}}</td>
                                            <td>{{$payment->total_amount}}</td>
                                            <td>
                                                @foreach (json_decode($payment->order_ids) as $order_id)
                                                    #{{explode('-',App\Models\Vendor\Order::where('id',$order_id)->first()->order_id)[1]}},
                                                @endforeach
                                            </td>
                                            <td>{{$payment->collection_mode}}</td>
                                            <td>
                                                <a href="# class="action-icon"> <i class="uil-print"></i></a>
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
                                {!! $payments->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

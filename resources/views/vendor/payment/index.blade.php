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
                    <div class="card-header">
                        <form action="{{route('vendor.payment.index')}}">
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
                                                <a href="{{route('vendor.generate.invoice',$payment->id)}}" rel="noopener" target="_blank" class="btn btn-default">
                                                    <i class="uil-print"></i>
                                                </a>
                                                <a href="#" class="action-icon"></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('admins/js/moment.min.js')}}"></script>
    <script src="{{asset('admins/js/daterangepicker.js')}}"></script>
    <script>

        $('#reservation').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        })

        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + '-' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    </script>
@endsection

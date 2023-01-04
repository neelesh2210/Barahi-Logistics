@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="dripicons-plus"></i>Add New Order</a>
                    </div>
                    <div class="page-title-right" style="padding-right: 10px;">
                        <a href="{{route('admin.view.bulk.order')}}" class="btn btn-primary"><i class="dripicons-plus"></i>Add Bulk Orders</a>
                    </div>
                    <div class="page-title-right" style="padding-right: 10px;">
                        <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="mdi mdi-eye"></i>View Bulk Orders</a>
                    </div>
                    <div class="page-title-right" style="padding-right: 10px;">
                        <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="dripicons-print"></i>Print Invoice</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('orders.index')}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="source">Source</label>
                                    <select name="source" id="source" class="form-control select2" data-toggle="select2" >
                                        <option value="">Select Source</option>
                                        @foreach (App\Models\Admin\Branch::orderBy('branch_name','asc')->get() as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="destination">Destination</label>
                                    <select name="destination" id="destination" class="form-control select2" data-toggle="select2" >
                                        <option value="">Select Destination...</option>
                                        @foreach (App\Models\Admin\DestinationWithCharge::orderBy('destination','asc')->get() as $destination)
                                            <option value="{{$destination->id}}">{{$destination->destination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control select2" data-toggle="select2" >
                                        <option value="">Select Status</option>
                                        <option value="drop_off_order_created">Drop Off Order Created</option>
                                        <option value="pickup_order_created">Pickup Order Created</option>
                                        <option value="sent_for_pickup">Sent for Pickup</option>
                                        <option value="pickup_complete">Pickup Complete</option>
                                        <option value="dispatched">Dispatched</option>
                                        <option value="arrived">Arrived</option>
                                        <option value="returned_to_warehouse">Returned To Warehouse</option>
                                        <option value="sent_for_delivery">Sent for Delivery</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="returned_delivered">Returned Delivered</option>
                                        <option value="sent_to_vendor">Sent To Vendor</option>
                                        <option value="order_created">Order Created</option>
                                        <option value="hold">Hold</option>
                                        <option value="cancelled">Cancelled</option>
                                        <option value="rtv_branch">RTV Branch</option>
                                        <option value="rtv_all">RTV All</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="date_range">Date Range</label>
                                    <input type="text" name="date_range" class="form-control float-right" placeholder="Date Range" id="reservation">
                                </div>
                                <div class="col-md-3">
                                    <label for="search">Search</label>
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search Order Id,Phone,Name">
                                </div>
                                <div class="col-md-1" style="margin-top: 2%;">
                                    <button class="btn btn-primary">Fillter</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                            <td>{{$order->destination->destination}}</td>
                                            <td>
                                                <b>Name:</b>{{$order->receiver_name}} <br>
                                                <b>Phone</b>{{$order->receiver_phone}} <br>
                                                <b>Alt Phone</b>{{$order->receiver_alt_phone}} <br>
                                                <b>Alt Phone</b>{{$order->receiver_address}}
                                            </td>
                                            <td>{{$order->cod_charge}}</td>
                                            <td>{{$order->remark}}</td>
                                            <td>{{ucwords(str_replace('_',' ',$order->order_status))}}</td>
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

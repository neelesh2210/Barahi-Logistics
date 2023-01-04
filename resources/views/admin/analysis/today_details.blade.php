@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Today Detail's</li>
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
                                <form action="{{route('admin.today.details')}}">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button value="orders" class="btn btn-primary">Orders</button>
                                            </div>
                                            <div class="col-md-2 text-start">
                                                <button name="status" value="delivered" class="btn btn-primary">Delivered Order</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button name="status" value="return_to_vendor" class="btn btn-primary">RTV Order</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button name="status" value="order_created" class="btn btn-primary">Pending Orderr</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button name="status" value="returned_to_warehouse" class="btn btn-primary">Returned Orderr</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Vendor Details</th>
                                            <th>Destination Branch</th>
                                            <th>Receiver Details</th>
                                            <th>COD Amount</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $key=>$order)
                                            <tr>
                                                <td>{{($key+1) + ($orders->currentPage() - 1)*$orders->perPage()}}</td>
                                                <td>{{$order->order_id}}</td>
                                                <td>{{$order->vendor->name}} ({{$order->vendor->phone}})</td>
                                                <td>{{$order->destination->destination}}</td>
                                                <td>
                                                    <b>Name:</b>{{$order->receiver_name}} <br>
                                                    <b>Phone</b>{{$order->receiver_phone}} <br>
                                                    <b>Alt Phone</b>{{$order->receiver_alt_phone}} <br>
                                                    <b>Alt Phone</b>{{$order->receiver_address}}
                                                </td>
                                                <td>{{$order->cod_charge}}</td>
                                                <td>
                                                    <select name="status" class="form-control select2" id="status_{{$order->id}}" onchange="change_status({{$order->id}})">
                                                        <option value="order_created" @if($order->order_status == 'order_created') selected @endif>Order Created</option>
                                                        <option value="sent_for_pickup" @if($order->order_status == 'sent_for_pickup') selected @endif>Sent for Pickup</option>
                                                        <option value="pickup_complete" @if($order->order_status == 'pickup_complete') selected @endif>Pickup Complete</option>
                                                        <option value="sent_for_delivery" @if($order->order_status == 'sent_for_delivery') selected @endif>Sent for Delivery</option>
                                                        <option value="delivered" @if($order->order_status == 'delivered') selected @endif>Delivered</option>
                                                        <option value="returned_to_warehouse" @if($order->order_status == 'returned_to_warehouse') selected @endif>Returned To Warehouse</option>
                                                        <option value="return_to_vendor" @if($order->order_status == 'return_to_vendor') selected @endif>Return To Vendor</option>
                                                        <option value="return_sent_to_vendor" @if($order->order_status == 'return_sent_to_vendor') selected @endif>Return Sent To Vendor</option>
                                                        <option value="return_delivered_to_vendor" @if($order->order_status == 'return_delivered_to_vendor') selected @endif>Return Delivered To Vendor</option>
                                                    </select>
                                                </td>
                                                <td class="table-action">
                                                    <a href="{{route('admin.orders.show',$order->id)}}" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
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
        </section>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    function change_status(id)
    {
        var status = $('#status_'+id).val();
        $.get("{{ route('admin.orders.status', ['','']) }}"+"/"+id+"/"+status,function(data)
        {
            location.reload();
        });
    }

</script>

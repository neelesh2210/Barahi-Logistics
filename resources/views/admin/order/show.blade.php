@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-5">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders List</li>
                        </ol>
                    </div>
                    <div class="col-sm-2 text-center">
                        <select name="status" class="form-control select2" id="status" onchange="change_status({{$order->id}})">
                            <option value="drop_off_order_created" @if($order->order_status == 'drop_off_order_created') selected @endif>Drop Off Order Created</option>
                            <option value="pickup_order_created" @if($order->order_status == 'pickup_order_created') selected @endif>Pickup Order Created</option>
                            <option value="sent_for_pickup" @if($order->order_status == 'sent_for_pickup') selected @endif>Sent for Pickup</option>
                            <option value="pickup_complete" @if($order->order_status == 'pickup_complete') selected @endif>Pickup Complete</option>
                            <option value="dispatched" @if($order->order_status == 'dispatched') selected @endif>Dispatched</option>
                            <option value="arrived" @if($order->order_status == 'arrived') selected @endif>Arrived</option>
                            <option value="returned_to_warehouse" @if($order->order_status == 'returned_to_warehouse') selected @endif>Returned To Warehouse</option>
                            <option value="sent_for_delivery" @if($order->order_status == 'sent_for_delivery') selected @endif>Sent for Delivery</option>
                            <option value="delivered" @if($order->order_status == 'delivered') selected @endif>Delivered</option>
                            <option value="returned_delivered" @if($order->order_status == 'returned_delivered') selected @endif>Returned Delivered</option>
                            <option value="sent_to_vendor" @if($order->order_status == 'sent_to_vendor') selected @endif>Sent To Vendor</option>
                            <option value="order_created" @if($order->order_status == 'order_created') selected @endif>Order Created</option>
                            <option value="hold" @if($order->order_status == 'hold') selected @endif>Hold</option>
                            <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
                            <option value="rtv_branch" @if($order->order_status == 'rtv_branch') selected @endif>RTV Branch</option>
                            <option value="rtv_all" @if($order->order_status == 'rtv_all') selected @endif>RTV All</option>
                        </select>
                    </div>
                    <div class="col-sm-5 text-right">
                        <h2>Order ID: {{$order->order_id}}</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-outline card-info p-3">
                    <div class="row">
                        <div class="col-5">
                            <h3>Basic Info</h3>
                            <h5>{{$order->branch->branch_name}} <i class="uil-exchange-alt"></i> {{$order->destination->destination}}</h5>
                            <br>
                            Vendor:<b> {{$order->vendor->name}}</b> <br>
                            Receiver: <b>{{$order->receiver_name}} - {{$order->receiver_phone}}</b> <br>
                            COD Charge: <b>{{$order->cod_charge}}</b> <br>
                            Delivery Charge: <b>{{$order->delivery_charge}}</b> <br>
                            Contact Number: <b>{{$order->receiver_phone}}</b> <br>
                            Delivery Address: <b>{{$order->receiver_address}}</b> <br>
                            Created On: <b>{{$order->created_at->format('M, d, Y, h:i A')}}</b> <br>
                            Created By: <b>{{$order->vendor->name}}</b> <br>
                        </div>
                        <div class="col-5">
                            <h3>Additional Info</h3>
                            Tracking Code: <b>{{$order->order_id}}</b> <br>
                            Package Access: <b>{{$order->package_access}}</b> <br>
                            Delivery Instruction: <b></b> <br>
                            Vendor Reference ID: <b></b> <br>
                            Description: <b></b> <br>
                            <hr>
                            Payment Status: <b></b> <br>
                            Payment Collection: <b></b> <br>
                            Last Updated: <b></b>
                            <hr>
                        </div>
                        <div class="col-2 text-right">
                            {{-- {!! QrCode::size(500)->format('png')->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));!!} --}}
                            {!! QrCode::size(150)->generate($order->order_id); !!}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Status Updates</h3>
                            <b>Order Created by:</b> {{$order->vendor->name}} on {{$order->created_at->format('M, d, Y, h:i A')}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Comments:</h3>
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
        var status = $('#status').val();
        $.get("{{ route('admin.orders.status', ['','']) }}"+"/"+id+"/"+status,function(data)
        {
            location.reload();
        });
    }

</script>

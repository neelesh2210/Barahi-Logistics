@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Order List</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <h2>Order ID: {{$order->order_id}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
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
    </div>

@endsection


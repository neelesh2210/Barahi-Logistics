@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders List</li>
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
                                <form action="{{route('admin.orders.index')}}">
                                    <div class="row">
                                        <div class="col-md-2">
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
                                                <option value="order_created">Order Created</option>
                                                <option value="sent_for_pickup">Sent for Pickup</option>
                                                <option value="pickup_complete">Pickup Complete</option>
                                                <option value="sent_for_delivery">Sent for Delivery</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="returned_to_warehouse">Returned To Warehouse</option>
                                                <option value="return_to_vendor">Return To Vendor</option>
                                                <option value="return_sent_to_vendor">Return Sent To Vendor</option>
                                                <option value="return_delivered_to_vendor">Return Delivered To Vendor</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="date_range">Date Range</label>
                                            <input type="text" name="date_range" class="form-control float-right" placeholder="Date Range" id="reservation">
                                        </div>
                                        <div class="col-md-1" style="margin-top: 2%;">
                                            <button class="btn btn-primary">Fillter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body table-responsive p-2">
                                @include('admin.order.table')
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

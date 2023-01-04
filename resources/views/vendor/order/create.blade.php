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
                            <li class="breadcrumb-item active">Add Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('orders.store')}}" class="needs-validation" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="branch_id">Branch</label>
                                    <select name="branch_id" id="branch_id" class="form-control" required>
                                        @foreach (App\Models\Admin\Branch::orderBy('branch_name','asc')->get() as $branch)
                                            <option value="{{$branch->id}}" selected>{{$branch->branch_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="destination_id">Destination</label>
                                    <select name="destination_id" id="destination_id" class="form-control select2" data-toggle="select2" onchange="get_delivery_charge()" required>
                                        <option value="">Select Destination...</option>
                                        @foreach (App\Models\Admin\DestinationWithCharge::orderBy('destination','asc')->get() as $destination)
                                            <option value="{{$destination->id}}">{{$destination->destination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="receiver_name">Receiver Name</label>
                                    <input type="text" name="receiver_name" id="receiver_name" class="form-control" placeholder="Receiver Name...">
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="receiver_phone">Receiver Phone</label>
                                    <input type="number" name="receiver_phone" id="receiver_phone" class="form-control" placeholder="Receiver Phone...">
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="receiver_alt_phone">Receiver Alt Phone</label>
                                    <input type="text" name="receiver_alt_phone" id="receiver_alt_phone" class="form-control" placeholder="Receiver Alt Phone...">
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="receiver_address">Receiver Full Address</label>
                                    <textarea name="receiver_address" id="receiver_address" class="form-control" placeholder="Receiver Full Address..."></textarea>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="weight">Weight</label>
                                    <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="1" placeholder="Weight..." readonly>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="delivery_charge">Delivery Charge</label>
                                    <input type="number" step="0.01" name="delivery_charge" id="delivery_charge" class="form-control" placeholder="Delivery Charge..." readonly>
                                </div>
                                {{-- <div class="col-md-6 pt-2">
                                    <label class="form-label" for="pickup_type">Pickup Type</label>
                                    <select name="pickup_type" id="pickup_type" class="form-control" required>
                                        <option value="drop_off">Drop Off</option>
                                        <option value="pick_up">Pick Up</option>
                                    </select>
                                </div> --}}
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="cod_charge">COD Charge</label>
                                    <input type="number" step="0.01" name="cod_charge" id="cod_charge" class="form-control" placeholder="COD Charge...">
                                </div>
                                {{-- <div class="col-md-6 pt-2">
                                    <label class="form-label" for="package_access">Package Access</label>
                                    <select name="package_access" id="package_access" class="form-control" required>
                                        <option value="can_open">Can Open</option>
                                        <option value="can't_open">Can't Open</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-md-6 pt-2">
                                    <label class="form-label" for="package_type">Package Type</label>
                                    <input type="text" name="package_type" id="package_type" class="form-control" placeholder="Package Type...">
                                </div> --}}
                                <div class="col-md-6 pt-2">
                                    <label class="form-label" for="remark">Remark</label>
                                    <textarea name="remark" id="remark" class="form-control" placeholder="Remark..."></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" type="submit">Add Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function get_delivery_charge()
        {
            var destination_id=$('#destination_id').val();
            $.get("{{ route('get.delivery.charge', '') }}"+"/"+destination_id,function(data)
            {
                $('#delivery_charge').val(data.charge);
            });
        }

    </script>
@endsection


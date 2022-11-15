@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper mb-5">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.payment.index')}}">Payment List</a></li>
                            <li class="breadcrumb-item active">Make Payment</li>
                        </ol>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>
        <section class="content mb-5">
            <div class="container-fluid">
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('admin.payment.store')}}" method="POST" class="form-example form-validate">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name<span class="text-danger">*</span></label>
                                                        <select name="vendor_id" id="vendor_id" class="form-control select2" onchange="getVendorOrders()" required>
                                                            <option value="">Select Vendor</option>
                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{$vendor->id}}">{{$vendor->name}} ({{$vendor->phone}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="order_table"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Make this Payment?');"><i class="fa fa-check" aria-hidden="true"></i> Make Payment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>

    function getVendorOrders()
    {
        var vendor_id=$('#vendor_id').val();
        if(vendor_id)
        {
            $.get("{{ route('admin.get.vendor.orders', '') }}"+"/"+vendor_id,function(data)
            {
                $('#order_table').html(data);
            });
        }
        else
        {
            alert('Select Vendor!')
            $('#order_table').empty();
        }
    }

</script>

@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper mb-5">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.assign-order.index')}}">Assign Order List</a></li>
                            <li class="breadcrumb-item active">Assign Order</li>
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
                                    <form action="{{route('admin.assign-order.store')}}" method="POST" class="form-example form-validate">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="delivery_boy">Delivery Boy<span class="text-danger">*</span></label>
                                                        <select name="delivery_boy" id="delivery_boy" class="form-control select2" onchange="getOrders()" required>
                                                            <option value="">Select Delivery Boy</option>
                                                            @foreach ($delivery_boys as $delivery_boy)
                                                                <option value="{{$delivery_boy->id}}">{{$delivery_boy->name}} ({{$delivery_boy->phone_number}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="order_table"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Assign this Order ?');"><i class="fa fa-check" aria-hidden="true"></i> Assign Order</button>
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

    function getOrders()
    {
        var delivery_boy_id=$('#delivery_boy').val();
        if(delivery_boy_id)
        {
            $.get("{{ route('get.assign.delivery.boy.orders') }}",function(data)
            {
                $('#order_table').html(data);
            });
        }
        else
        {
            alert('Select Delivery Boy!')
            $('#order_table').empty();
        }
    }

</script>

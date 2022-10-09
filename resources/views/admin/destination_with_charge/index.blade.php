@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Destination List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
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
                                <h3 class="card-title">Destination List</h3>
                                <div class="card-tools">
                                    <form action="{{route('destination-with-charges.index')}}">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="key" value="" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-2">
                                @include('admin.destination_with_charge.table')
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-outline card-info">
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    @if (isset($edit_data))
                                        <form action="{{route('destination-with-charges.update', $edit_data->id)}}" method="POST" class="form-example">
                                            @method('PUT')
                                    @else
                                        <form action="{{route('destination-with-charges.store')}}" method="POST" class="form-example">
                                    @endif
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 form_div">
                                                    <div class="form-group">
                                                        <label for="destination">Destination</label>
                                                        <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination..." value="@isset($edit_data){{$edit_data->destination}}@endisset" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form_div">
                                                    <div class="form-group">
                                                        <label for="charge">Charge</label>
                                                        <input type="number" step="0.01" class="form-control" id="charge" name="charge" placeholder="Enter Charge..." value="@isset($edit_data){{$edit_data->charge}}@endisset" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save this Destination?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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

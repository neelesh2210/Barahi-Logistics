@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Assign Order List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.assign-order.create')}}" class="btn btn-success float-right"> Assign Order <i class="fas fa-plus"></i></a>
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
                                <form action="{{route('admin.payment.index')}}">
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
                            <div class="card-body table-responsive p-2">
                                @include('admin.assign_order.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

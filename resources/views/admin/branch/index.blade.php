@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Branch List</li>
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
                                <h3 class="card-title">Branch List</h3>
                                <div class="card-tools">
                                    <form action="{{route('branches.index')}}">
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
                                @include('admin.branch.table')
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card card-outline card-info">
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    @if (isset($edit_data))
                                        <form action="{{route('branches.update', $edit_data->id)}}" method="POST" class="form-example form-validate">
                                            @method('PUT')
                                    @else
                                        <form action="{{route('branches.store')}}" method="POST" class="form-example form-validate">
                                    @endif
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12 form_div">
                                                    <div class="form-group">
                                                        <label for="branch_code">Branch Code</label>
                                                        <input type="text" class="form-control @error('branch_code') is-invalid @enderror" id="branch_code" name="branch_code" placeholder="Enter Branch Code..." value="@isset($edit_data){{$edit_data->branch_code}}@else{{old('branch_code')}}@endisset" required>
                                                        @if ($errors->has('branch_code'))
                                                            <label id="branch_code-error" class="error invalid-feedback" for="branch_code">{{ $errors->first('branch_code') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form_div">
                                                    <div class="form-group">
                                                        <label for="branch_name">Branch Name</label>
                                                        <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name..." value="@isset($edit_data){{$edit_data->branch_name}}@else{{old('branch_name')}}@endisset" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Save this Branch?');"><i class="fa fa-check" aria-hidden="true"></i> SAVE</button>
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

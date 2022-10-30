@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('delivery-boys.index')}}">Delivery Boy List</a></li>
                            <li class="breadcrumb-item active">Register Delivery Boy</li>
                        </ol>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('delivery-boys.store')}}" method="POST" class="form-example form-validate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter Vendor Name..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                                                        <input type="number" name="phone_number" id="phone_number" value="{{old('phone_number')}}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter Phone Number..." required>
                                                        @if ($errors->has('phone_number'))
                                                            <label id="phone-error" class="error invalid-feedback" for="phone_number">{{ $errors->first('phone_number') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="address">Address<span class="text-danger">*</span></label>
                                                        <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control" placeholder="Enter Vendor Address..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dl_number">DL Number<span class="text-danger">*</span></label>
                                                        <input type="text" name="dl_number" id="dl_number" value="{{old('dl_number')}}" class="form-control @error('dl_number') is-invalid @enderror" placeholder="Enter DL Number..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dl_image">Upload DL Document Image<span class="text-danger">*</span></label>
                                                        <input type="file" name="dl_image" id="dl_image" value="{{old('dl_image')}}" class="form-control" style="height: 45px;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="vechile_number">Vechile Number<span class="text-danger">*</span></label>
                                                        <input type="text" name="vechile_number" id="vechile_number" value="{{old('vechile_number')}}" class="form-control @error('vechile_number') is-invalid @enderror" placeholder="Enter Vechile Number..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="password">Password<span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Vendor Password..." required>
                                                        @if ($errors->has('password'))
                                                            <label id="password-error" class="error invalid-feedback" for="password">{{ $errors->first('password') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Register this Delivery Boy?');"><i class="fa fa-check" aria-hidden="true"></i> Register</button>
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

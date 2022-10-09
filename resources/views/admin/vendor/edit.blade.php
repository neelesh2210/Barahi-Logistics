@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('vendors.index')}}">Vendors List</a></li>
                            <li class="breadcrumb-item active">Update Vendor Details</li>
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
                                    <form action="{{route('vendors.update',$vendor->id)}}" method="POST" class="form-example form-validate" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" value="{{old('name',$vendor->name)}}" class="form-control" placeholder="Enter Vendor Name..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number</label>
                                                        <input type="number" name="phone" id="phone" value="{{old('phone',$vendor->phone)}}" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Vendor Phone Number..." required>
                                                        @if ($errors->has('phone'))
                                                            <label id="phone-error" class="error invalid-feedback" for="phone">{{ $errors->first('phone') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" value="{{old('email',$vendor->email)}}" class="form-control" placeholder="Enter Vendor Email..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" name="company_name" id="company_name" value="{{old('company_name',$vendor->vendor_details->company_name)}}" class="form-control" placeholder="Enter Vendor Company Name..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" name="address" id="address" value="{{old('address',$vendor->vendor_details->address)}}" class="form-control" placeholder="Enter Vendor Address..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="registration_doc">Upload Registration Document Image</label>
                                                        <input type="file" name="registration_doc" id="registration_doc" value="{{old('registration_doc')}}" class="form-control" style="height: 45px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->registration_document)}}" style="height: 100px;width: 100px;">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="pan_doc">Upload Pan Image</label>
                                                        <input type="file" name="pan_doc" id="pan_doc" value="{{old('pan_doc')}}" class="form-control" style="height: 45px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->pan_image)}}" style="height: 100px;width: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Update this Vendor Details?');"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
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

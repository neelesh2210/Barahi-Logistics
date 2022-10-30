@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Delivery Boy List</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('delivery-boys.create')}}" class="btn btn-success float-right"> Register Delivery Boy <i class="fas fa-plus"></i></a>
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
                                <h3 class="card-title">Delivery Boy List</h3>
                                <div class="card-tools">
                                    <form action="{{route('delivery-boys.index')}}">
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
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Phone Number</th>
                                            <th class="text-center">Address</th>
                                            <th class="text-center">DL Number</th>
                                            <th class="text-center">DL Doc</th>
                                            <th class="text-center">Vechile Number</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($delivery_boys as $key=>$delivery_boy)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($delivery_boys->currentPage() - 1)*$delivery_boys->perPage()}}</td>
                                                <td class="text-center">{{$delivery_boy->name}}</td>
                                                <td class="text-center">{{$delivery_boy->phone_number}}</td>
                                                <td class="text-center">{{$delivery_boy->address}}</td>
                                                <td class="text-center">{{$delivery_boy->dl_number}}</td>
                                                <td class="text-center"><a href="{{asset('delivery_boys/assets/images/dl_docs/'.$delivery_boy->dl_image)}}" target="_blank"><img src="{{asset('delivery_boys/assets/images/dl_docs/'.$delivery_boy->dl_image)}}" style="height: 100px;width: 100px;"></a></td>
                                                <td class="text-center">{{$delivery_boy->vechile_number}}</td>
                                                <td class="text-center">
                                                    @if($delivery_boy->status)
                                                        <a href="#">
                                                            <span class="badge bg-success">Verified</span>
                                                        </a>
                                                    @else
                                                        <a href="#">
                                                            <span class="badge bg-danger">Not Verified</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('delivery-boys.edit',$delivery_boy->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br><h2>Nothing Found</h2></center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {!! $delivery_boys->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Preview Order List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Order List</h4>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Destination Branch</th>
                                        <th>Customer Name</th>
                                        <th>Full Address</th>
                                        <th>Phone Number</th>
                                        <th>Alt Phone Number</th>
                                        <th>COD</th>
                                        <th>Order Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list as $key=>$data)
                                        <tr>
                                            @if($key != 0)
                                                <td>{{$key}}</td>
                                                <td>{{$data[0]}}</td>
                                                <td>{{$data[1]}}</td>
                                                <td>{{$data[2]}}</td>
                                                <td>{{$data[3]}}</td>
                                                <td>{{$data[4]}}</td>
                                                <td>{{$data[5]}}</td>
                                                <td>{{$data[6]}}</td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr class="footable-empty">
                                            <td colspan="11">
                                            <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br><h2>Nothing Found</h2></center>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <form action="{{route('admin.store.bulk.order')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="excel_file" value="{{json_encode($list)}}">
                                <button class="btn btn-primary text-center">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

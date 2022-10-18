@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Notices List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Notices List</h4>
                        <div class="table-responsive-sm">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($notices as $key=>$notice)
                                        <tr>
                                            <td>{{($key+1) + ($notices->currentPage() - 1)*$notices->perPage()}}</td>
                                            <td>{{$notice->title}}</td>
                                            <td>{!!$notice->content!!}</td>
                                            <td>{{$notice->created_at->format('d-M-Y h:i A')}}</td>
                                            <td class="table-action">
                                                <a href="{{route('vendor.notices.show',$notice->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

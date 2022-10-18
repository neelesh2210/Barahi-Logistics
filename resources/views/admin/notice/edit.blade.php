@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin-notices.index')}}">Notices List</a></li>
                            <li class="breadcrumb-item active">Update Notices</li>
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
                                    <form action="{{route('admin-notices.update',$notice->id)}}" method="POST" class="form-example form-validate" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">Title<span class="text-danger">*</span></label>
                                                        <input type="text" name="title" id="title" value="{{old('title',$notice->title)}}" class="form-control" placeholder="Enter Title..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="content">Content<span class="text-danger">*</span></label>
                                                        <textarea class="summernote" name="content" required>{!!$notice->content!!}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="status">Status<span class="text-danger">*</span></label>
                                                        <select name="is_published" class="form-control">
                                                            <option value="0" @if($notice->is_published == '0') selected @endif>Not Published</option>
                                                            <option value="1" @if($notice->is_published == '1') selected @endif>Published</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Update this Notice?');"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
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

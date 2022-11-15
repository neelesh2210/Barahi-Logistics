@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper mb-5">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin-notices.index')}}">Notices List</a></li>
                            <li class="breadcrumb-item active">Create Notices</li>
                        </ol>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </section>
        <section class="content mb-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form action="{{route('admin-notices.store')}}" method="POST" class="form-example form-validate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title">Title<span class="text-danger">*</span></label>
                                                        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" placeholder="Enter Title..." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="content">Content<span class="text-danger">*</span></label>
                                                        <textarea class="summernote" name="content" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="status">Status<span class="text-danger">*</span></label>
                                                        <select name="is_published" class="form-control">
                                                            <option value="0">Not Published</option>
                                                            <option value="1">Published</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are You Sure You Want to Create this Notice?');"><i class="fa fa-check" aria-hidden="true"></i> Create</button>
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

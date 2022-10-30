@extends('vendor.layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="page-title-box">
                    <div class="page-title-left">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('vendor.ticket.index')}}">Ticket List</a></li>
                            <li class="breadcrumb-item active">Create Ticket</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('vendor.ticket.store')}}" class="needs-validation" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 pt-2">
                                    <label class="form-label" for="subject">Subject</label>
                                    <select name="subject" id="subject" class="form-control select2" data-toggle="select2" required>
                                        <option value="">Select Subject</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="COD Request">COD Request</option>
                                        <option value="Orders Inquiry">Orders Inquiry</option>
                                        <option value="Return Orders Inquiry">Return Orders Inquiry</option>
                                        <option value="Pickup Inquiry">Pickup Inquiry</option>
                                    </select>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Description..." required></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" type="submit">Generate Ticket</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


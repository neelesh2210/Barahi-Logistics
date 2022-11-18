@extends('admin.layouts.app')
@section('content')

    <div class="content-wrapper mb-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-5">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders List</li>
                        </ol>
                    </div>
                    <div class="col-sm-2 text-center">
                        <select name="status" class="form-control select2" id="status" onchange="change_status({{$order->id}})">
                            <option value="drop_off_order_created" @if($order->order_status == 'drop_off_order_created') selected @endif>Drop Off Order Created</option>
                            <option value="pickup_order_created" @if($order->order_status == 'pickup_order_created') selected @endif>Pickup Order Created</option>
                            <option value="sent_for_pickup" @if($order->order_status == 'sent_for_pickup') selected @endif>Sent for Pickup</option>
                            <option value="pickup_complete" @if($order->order_status == 'pickup_complete') selected @endif>Pickup Complete</option>
                            <option value="dispatched" @if($order->order_status == 'dispatched') selected @endif>Dispatched</option>
                            <option value="arrived" @if($order->order_status == 'arrived') selected @endif>Arrived</option>
                            <option value="returned_to_warehouse" @if($order->order_status == 'returned_to_warehouse') selected @endif>Returned To Warehouse</option>
                            <option value="sent_for_delivery" @if($order->order_status == 'sent_for_delivery') selected @endif>Sent for Delivery</option>
                            <option value="delivered" @if($order->order_status == 'delivered') selected @endif>Delivered</option>
                            <option value="returned_delivered" @if($order->order_status == 'returned_delivered') selected @endif>Returned Delivered</option>
                            <option value="sent_to_vendor" @if($order->order_status == 'sent_to_vendor') selected @endif>Sent To Vendor</option>
                            <option value="order_created" @if($order->order_status == 'order_created') selected @endif>Order Created</option>
                            <option value="hold" @if($order->order_status == 'hold') selected @endif>Hold</option>
                            <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>Cancelled</option>
                            <option value="rtv_branch" @if($order->order_status == 'rtv_branch') selected @endif>RTV Branch</option>
                            <option value="rtv_all" @if($order->order_status == 'rtv_all') selected @endif>RTV All</option>
                        </select>
                    </div>
                    <div class="col-sm-5 text-right">
                        <h2 style="color:#fff;">Order ID: {{$order->order_id}}</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="content mb-5">
            <div class="container-fluid">
                <div class="card card-outline card-info p-3">
                    <div class="row">
                        <div class="col-5">
                            <h3>Basic Info</h3>
                            <h5>{{$order->branch->branch_name}} <i class="uil-exchange-alt"></i> {{$order->destination->destination}}</h5>
                            <br>
                            Vendor:<b> {{$order->vendor->name}}</b> <br>
                            Receiver: <b>{{$order->receiver_name}} - {{$order->receiver_phone}}</b> <br>
                            COD Charge: <b>{{$order->cod_charge}}</b> <br>
                            Delivery Charge: <b>{{$order->delivery_charge}}</b> <br>
                            Contact Number: <b>{{$order->receiver_phone}}</b> <br>
                            Delivery Address: <b>{{$order->receiver_address}}</b> <br>
                            Created On: <b>{{$order->created_at->format('M, d, Y, h:i A')}}</b> <br>
                            Created By: <b>{{$order->vendor->name}}</b> <br>
                        </div>
                        <div class="col-5">
                            <h3>Additional Info | <a style="cursor: pointer" onclick="additional_info()"><i class="fas fa-plus-circle"></i></a></h3>
                            Tracking Code: <b>{{$order->order_id}}</b> <br>
                            Package Access: <b>{{ucwords(str_replace('_',' ',$order->package_access))}}</b> <br>
                            Delivery Instruction: <b>{{$order->delivery_instruction}}</b> <br>
                            Vendor Reference ID: <b>{{$order->vendor_reference_id}}</b> <br>
                            Description: <b>{{$order->remark}}</b> <br>
                            <hr>
                            Order Status: <b>{{ucwords(str_replace('_',' ',$order->order_status))}}</b> <br>
                            Payment Collection: <b>Pending</b> <br>
                            Last Updated: <b>{{$order->updated_at->format('M, d, Y, h:i A')}}</b>
                            <hr>
                        </div>
                        <div class="col-2 text-right">
                            {{-- {!! QrCode::size(500)->format('png')->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));!!} --}}
                            {!! QrCode::size(150)->generate($order->order_id); !!}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Status Updates</h3>
                            <b>Order Created by:</b> {{$order->vendor->name}} on {{$order->created_at->format('M, d, Y, h:i A')}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h3>Comments | <a style="cursor: pointer" onclick="comment()"><i class="fas fa-comment-medical"></i></a></h3>
                            @foreach (App\Models\Vendor\OrderComment::where('order_id',$order->id)->get() as $order_comment)
                            <div class="row">
                                <div class="col-md-6">
                                    @if($order_comment->user_type == 'vendor')
                                        {{App\Models\Vendor\Vendor::where('id',$order_comment->user_id)->first()->name}}
                                    @elseif($order_comment->user_type == 'admin')
                                        {{App\Models\Admin\Admin::where('id',$order_comment->user_id)->first()->name}}
                                    @endif
                                    <br>
                                    {{$order_comment->created_at->format('M, d, Y, h:i A')}}
                                </div>
                                <div class="col-md-6">
                                    {{$order_comment->comment}}
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade show" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Additional Info</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('additional.info',$order->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <label>Priority <span class="text-danger">*</span></label>
                                <select name="priority" class="form-control">
                                    <option value="normal" @if($order->priority == 'normal') selected @endif>Normal</option>
                                    <option value="high" @if($order->priority == 'high') selected @endif>High</option>
                                    <option value="urgent" @if($order->priority == 'urgent') selected @endif>Urgent</option>
                                </select>
                            </div>
                            <div class="col-md-6 pt-2">
                                <label>Vendor Reference ID</label>
                                <input type="text" class="form-control" name="vendor_reference_id" value="{{$order->vendor_reference_id}}">
                            </div>
                            <div class="col-md-6 pt-2">
                                <label>Description</label>
                                <textarea name="remark" class="form-control" cols="30" rows="10">{{$order->remark}}</textarea>
                            </div>
                            <div class="col-md-6 pt-2">
                                <label>Delivery Instruction</label>
                                <textarea name="delivery_instruction" class="form-control" cols="30" rows="10">{{$order->delivery_instruction}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade show" id="comment-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Comment</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('order-comments.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="user_type" value="admin">
                            <div class="col-md-12 pt-2">
                                <label>Comment Type <span class="text-danger">*</span></label>
                                <select name="comment_type" class="form-control">
                                    <option value="information">Information</option>
                                    <option value="actionable">Actionable</option>
                                </select>
                            </div>
                            <div class="col-md-12 pt-2">
                                <label>Comment</label>
                                <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>

    function change_status(id)
    {
        var status = $('#status').val();
        $.get("{{ route('admin.orders.status', ['','']) }}"+"/"+id+"/"+status,function(data)
        {
            location.reload();
        });
    }

    function additional_info()
    {
        $('#modal').modal('show')
    }

    function comment()
    {
        $('#comment-modal').modal('show')
    }

</script>

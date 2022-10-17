<table class="table table-hover table-centered mb-0">
    <thead>
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Vendor Details</th>
            <th>Destination Branch</th>
            <th>Receiver Details</th>
            <th>COD Amount</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $key=>$order)
            <tr>
                <td>{{($key+1) + ($orders->currentPage() - 1)*$orders->perPage()}}</td>
                <td>{{$order->order_id}}</td>
                <td>{{$order->vendor->name}} ({{$order->vendor->phone}})</td>
                <td>{{$order->destination->destination}}</td>
                <td>
                    <b>Name:</b>{{$order->receiver_name}} <br>
                    <b>Phone</b>{{$order->receiver_phone}} <br>
                    <b>Alt Phone</b>{{$order->receiver_alt_phone}} <br>
                    <b>Alt Phone</b>{{$order->receiver_address}}
                </td>
                <td>{{$order->cod_charge}}</td>
                <td>
                    <select name="status" class="form-control select2" id="status_{{$order->id}}" onchange="change_status({{$order->id}})">
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
                </td>
                <td class="table-action">
                    <a href="{{route('admin.orders.show',$order->id)}}" class="btn btn-primary"> <i class="fas fa-eye"></i></a>
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

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Order ID</th>
            <th class="text-center">Destination Branch</th>
            <th class="text-center">Receiver Details</th>
            <th class="text-center">COD Amount</th>
            <th class="text-center">Delivery Charge</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $key=>$order)
            <tr>
                <td class="text-center">
                    <input type="checkbox" name="order_ids[]" value="{{$order->id}}" class="form-control">
                    <input type="hidden" name="cod_amount[]" value="{{$order->cod_charge}}">
                    <input type="hidden" name="delivery_charge[]" value="{{$order->delivery_charge}}">
                </td>
                <td class="text-center">{{$order->order_id}}</td>
                <td class="text-center">{{$order->destination->destination}}</td>
                <td class="text-center">
                    <b>Name:</b>{{$order->receiver_name}} <br>
                    <b>Phone</b>{{$order->receiver_phone}} <br>
                    <b>Alt Phone</b>{{$order->receiver_alt_phone}} <br>
                    <b>Alt Phone</b>{{$order->receiver_address}}
                </td>
                <td class="text-center">{{$order->cod_charge}}</td>
                <td class="text-center">{{$order->delivery_charge}}</td>
                <td class="text-center">{{ucwords(str_replace('_',' ',$order->order_status))}}</td>
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

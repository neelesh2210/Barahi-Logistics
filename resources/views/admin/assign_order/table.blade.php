<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Assign ID</th>
            <th class="text-center">Delivery Boy</th>
            <th class="text-center">Orders</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($assign_orders as $key=>$assign_order)
            <tr>
                <td class="text-center">{{($key+1) + ($assign_orders->currentPage() - 1)*$assign_orders->perPage()}}</td>
                <td class="text-center">{{$assign_order->assign_id}}</td>
                <td class="text-center">{{$assign_order->delivery_boy->name}}</td>
                <td class="text-center">
                    @php
                        $order_ids = App\Models\Admin\AssignOrder::where('assign_id',$assign_order->assign_id)->pluck('order_id');
                    @endphp
                    @foreach ($order_ids as $order_id)
                        #{{explode('-',App\Models\Vendor\Order::where('id',$order_id)->first()->order_id)[1]}},
                    @endforeach
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
    {!! $assign_orders->links() !!}
</div>

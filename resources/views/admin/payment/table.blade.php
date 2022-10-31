<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Transaction ID</th>
            <th class="text-center">Vendor</th>
            <th class="text-center">Orders</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Collection Mode</th>
            <th class="text-center">Print</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payments as $key=>$payment)
            <tr>
                <td class="text-center">{{($key+1) + ($payments->currentPage() - 1)*$payments->perPage()}}</td>
                <td class="text-center">{{$payment->transfer_id}}</td>
                <td class="text-center">{{$payment->vendor->name}}</td>
                <td class="text-center">
                    @foreach (json_decode($payment->order_ids) as $order_id)
                        #{{explode('-',App\Models\Vendor\Order::where('id',$order_id)->first()->order_id)[1]}},
                    @endforeach
                </td>
                <td class="text-center">{{$payment->total_amount}}</td>
                <td class="text-center">{{$payment->collection_mode}}</td>
                <td class="text-center">
                    <a href="{{route('admin.generate.invoice',$payment->id)}}" rel="noopener" target="_blank" class="btn btn-default">
                        <i class="fas fa-print"></i>
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
    {!! $payments->links() !!}
</div>

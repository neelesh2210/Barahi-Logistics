<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Destination</th>
            <th class="text-center">Charge</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($destination_with_charges as $key=>$destination_with_charge)
            <tr>
                <td class="text-center">{{($key+1) + ($destination_with_charges->currentPage() - 1)*$destination_with_charges->perPage()}}</td>
                <td class="text-center">{{$destination_with_charge->destination}}</td>
                <td class="text-center">{{$destination_with_charge->charge}}</td>
                <td class="text-center">
                    <a href="{{route('destination-with-charges.edit',$destination_with_charge->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('destination-with-charges.destroy',$destination_with_charge->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                        <i class="fas fa-trash"></i>
                    </a>
                    <form id="delete-form" action="{{ route('destination-with-charges.destroy',$destination_with_charge->id) }}" method="POST" class="d-none">
                        @method('DELETE')
                        @csrf
                    </form>
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
    {!! $destination_with_charges->links() !!}
</div>

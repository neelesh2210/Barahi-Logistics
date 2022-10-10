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
        @forelse ($branches as $key=>$branch)
            <tr>
                <td class="text-center">{{($key+1) + ($branches->currentPage() - 1)*$branches->perPage()}}</td>
                <td class="text-center">{{$branch->branch_code}}</td>
                <td class="text-center">{{$branch->branch_name}}</td>
                <td class="text-center">
                    <a href="{{route('branches.edit',$branch->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('branches.destroy',$branch->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                        <i class="fas fa-trash"></i>
                    </a>
                    <form id="delete-form" action="{{ route('branches.destroy',$branch->id) }}" method="POST" class="d-none">
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
    {!! $branches->links() !!}
</div>

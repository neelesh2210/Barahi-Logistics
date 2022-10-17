<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Address</th>
            <th class="text-center">Company Name</th>
            <th class="text-center">Registration Doc</th>
            <th class="text-center">Pan Doc</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($vendors as $key=>$vendor)
            <tr>
                <td class="text-center">{{($key+1) + ($vendors->currentPage() - 1)*$vendors->perPage()}}</td>
                <td class="text-center">{{$vendor->name}}</td>
                <td class="text-center">{{$vendor->email}}</td>
                <td class="text-center">{{$vendor->phone}}</td>
                <td class="text-center">{{$vendor->vendor_details->address}}</td>
                <td class="text-center">{{$vendor->vendor_details->company_name}}</td>
                <td class="text-center"><a href="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->registration_document)}}" target="_blank"><img src="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->registration_document)}}" style="height: 100px;width: 100px;"></a></td>
                <td class="text-center"><a href="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->pan_image)}}" target="_blank"><img src="{{asset('vendors/assets/images/vendor_docs/'.$vendor->vendor_details->pan_image)}}" style="height: 100px;width: 100px;"></a></td>
                <td class="text-center">
                    @if($vendor->status)
                        <a href="{{route('vendors.show',$vendor->id)}}?status=0">
                            <span class="badge bg-success">Verified</span>
                        </a>
                    @else
                        <a href="{{route('vendors.show',$vendor->id)}}?status=1">
                            <span class="badge bg-danger">Not Verified</span>
                        </a>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{route('vendors.edit',$vendor->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
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
    {!! $vendors->links() !!}
</div>

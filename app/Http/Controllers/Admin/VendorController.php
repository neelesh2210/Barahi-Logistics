<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Vendor\Vendor;
use App\Models\Vendor\VendorDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{

    public function index(Request $request)
    {
        $vendors=Vendor::orderBy('name','asc')->with('vendor_details');

        if($request->key)
        {
            $vendors=$vendors->where('name',$request->key)->orWhere('phone',$request->key);
        }
        $vendors=$vendors->paginate(10);
        return view('admin.vendor.index',compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|max:255',
            'phone' => 'required|min:10|max:10|unique:vendors',
            'password' => 'required|min:8',
        ]);

        $vendor=new Vendor;
        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->password=Hash::make($request->password);
        $vendor->save();

        $vendor_detail=new VendorDetail;
        $vendor_detail->vendor_id=$vendor->id;
        $vendor_detail->address=$request->address;
        $vendor_detail->company_name=$request->company_name;
        if($request->registration_doc)
        {
            $registration_doc_name = time().rand().'.'.$request->registration_doc->extension();
            $request->registration_doc->move(public_path('vendors/assets/images/vendor_docs'), $registration_doc_name);
            $vendor_detail->registration_document=$registration_doc_name;
        }
        if($request->pan_doc)
        {
            $pan_doc_name = time().rand().'.'.$request->pan_doc->extension();
            $request->pan_doc->move(public_path('vendors/assets/images/vendor_docs'), $pan_doc_name);
            $vendor_detail->pan_image=$pan_doc_name;
        }
        $vendor_detail->save();

        return redirect()->route('vendors.index')->with('success','Vendor Register Successfully!');
    }

    public function show(Request $request,Vendor $vendor)
    {
        $vendor->status=$request->status;
        $vendor->save();
        if($request->status)
        {
            return redirect()->route('vendors.index')->with('success','Vendor Verified Successfully!');
        }
        else
        {
            return redirect()->route('vendors.index')->with('error','Vendor Not Verified Successfully!');
        }
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.edit',compact('vendor'));
    }

    public function update(Request $request,Vendor $vendor)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|max:255',
            'phone' => 'required|min:10|max:10|unique:vendors,phone,'.$vendor->id,
        ]);

        $vendor->name=$request->name;
        $vendor->email=$request->email;
        $vendor->phone=$request->phone;
        $vendor->save();

        $vendor_detail=VendorDetail::find($vendor->id);
        $vendor_detail->vendor_id=$vendor->id;
        $vendor_detail->address=$request->address;
        $vendor_detail->company_name=$request->company_name;
        if($request->registration_doc)
        {
            $registration_doc_name = time().rand().'.'.$request->registration_doc->extension();
            $request->registration_doc->move(public_path('vendors/assets/images/vendor_docs'), $registration_doc_name);
            $vendor_detail->registration_document=$registration_doc_name;
        }
        if($request->pan_doc)
        {
            $pan_doc_name = time().rand().'.'.$request->pan_doc->extension();
            $request->pan_doc->move(public_path('vendors/assets/images/vendor_docs'), $pan_doc_name);
            $vendor_detail->pan_image=$pan_doc_name;
        }
        $vendor_detail->save();

        return redirect()->route('vendors.index')->with('success','Vendor Details Updated Successfully!');
    }

}

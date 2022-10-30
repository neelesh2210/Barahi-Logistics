<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DeliveryBoy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DeliveryBoyController extends Controller
{

    public function index()
    {
        $delivery_boys=DeliveryBoy::orderBy('name','asc')->paginate(10);

        return view('admin.delivery_boy.index',compact('delivery_boys'));
    }

    public function create()
    {
        return view('admin.delivery_boy.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone_number' => 'required|min:10|max:10|unique:delivery_boys',
            'password' => 'required|min:8',
        ]);
        $delivery_boy=new DeliveryBoy;
        $delivery_boy->name=$request->name;
        $delivery_boy->phone_number=$request->phone_number;
        $delivery_boy->address=$request->address;
        $delivery_boy->dl_number=$request->dl_number;
        if($request->dl_image)
        {
            $dl_doc_name = time().rand().'.'.$request->dl_image->extension();
            $request->dl_image->move(public_path('delivery_boys/assets/images/dl_docs'), $dl_doc_name);
            $delivery_boy->dl_image=$dl_doc_name;
        }
        $delivery_boy->vechile_number=$request->vechile_number;
        $delivery_boy->password=Hash::make($request->password);
        $delivery_boy->save();

        return redirect()->route('delivery-boys.index')->with('success','Delivery Boy Register Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

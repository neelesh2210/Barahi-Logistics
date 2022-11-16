<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\DestinationWithCharge;

class DestinationWithChargeController extends Controller
{

    public function index(Request $request)
    {
        $destination_with_charges=DestinationWithCharge::orderBy('destination','asc');

        if($request->key)
        {
            $destination_with_charges=$destination_with_charges->where('destination',$request->key);
        }
        $destination_with_charges=$destination_with_charges->paginate(10);

        return view('admin.destination_with_charge.index',compact('destination_with_charges'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $destination_with_charge=new DestinationWithCharge;
        $destination_with_charge->destination=$request->destination;
        $destination_with_charge->charge=$request->charge;
        $destination_with_charge->save();

        return redirect()->route('destination-with-charges.index')->with('success','Destination Added Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit(DestinationWithCharge $destination_with_charge)
    {
        $edit_data=$destination_with_charge;
        $destination_with_charges=DestinationWithCharge::orderBy('destination','asc')->paginate(10);
        return view('admin.destination_with_charge.index',compact('destination_with_charges','edit_data'));
    }

    public function update(Request $request, DestinationWithCharge $destination_with_charge)
    {
        $destination_with_charge->destination=$request->destination;
        $destination_with_charge->charge=$request->charge;
        $destination_with_charge->save();

        return redirect()->route('destination-with-charges.index')->with('success','Destination Updated Successfully!');
    }

    public function destroy(DestinationWithCharge $destination_with_charge)
    {
        $destination_with_charge->delete();
        return redirect()->route('destination-with-charges.index')->with('error','Destination Deleted Successfully!');
    }
}

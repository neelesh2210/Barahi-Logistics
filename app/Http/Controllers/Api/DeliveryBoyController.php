<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\AssignOrder;
use App\Models\Admin\DeliveryBoy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryBoyController extends Controller
{

    public function deliveryBoyLogin(Request $request)
    {
        $delivery_boy = DeliveryBoy::where('phone_number',$request->phone_number)->first();

        if($delivery_boy)
        {
            if(Hash::check($request->password, $delivery_boy->password))
            {
                $delivery_boy->access_token =  $delivery_boy->createToken('MyApp')->plainTextToken;
                return response()->json($delivery_boy);
            }
            else
            {
                return response()->json(['msg'=>'Wrong Password!'],401);
            }
        }
        else
        {
            return response()->json(['msg'=>'Phone Number Not Exists!'],401);
        }
    }

    public function deliveryBoyOrder(Request $request)
    {
        return $assign_orders = AssignOrder::where('delivery_boy_id',Auth::user()->id)->with('order')->paginate(10);

        return response()->json(['assign_orders'=>$assign_orders]);
    }

}

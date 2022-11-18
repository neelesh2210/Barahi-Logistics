<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Admin\DeliveryBoy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DeliveryBoyController extends Controller
{

    public function deliveryBoyLogin(Request $request)
    {
        $validatedData = $request->validate([
            'phone_number' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8',
        ]);
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

}

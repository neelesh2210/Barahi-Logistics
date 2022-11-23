<?php

namespace App\Http\Controllers\Api;

use App\Models\Vendor\Order;
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

    public function deliveryBoyStatusChange(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->order_status = $request->status;

        $order_status_date=json_decode($order->order_status_date);
        array_push($order_status_date,[$request->status=>date('d-m-y H:i')]);

        $order->order_status_date = $order_status_date;
        $order->save();

        return response()->json(['msg'=>'Order Status Changed Successfully!']);
    }

}

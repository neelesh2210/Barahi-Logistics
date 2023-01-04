<?php

namespace App\Imports\Admin;

use Auth;
use App\Models\User;
use App\Models\Vendor\Order;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Admin\DestinationWithCharge;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrdersImport implements ToModel,WithHeadingRow
{

    public function  __construct()
    {
        $or_id = Order::latest()->first();
        if($or_id)
        {
            $this->order_id = explode('-',$or_id->order_id)[1]+1;
        }
        else
        {
            $this->order_id = 100001;
        }
    }

    public function model(array $row)
    {
        $user = User::where('phone',$row['phone_number'])->first();
        if(!$user)
        {
            $user = new User;
            $user->name = $row['customer_name'];
            $user->phone = $row['phone_number'];
            $user->password = Hash::make($row['phone_number']);
            $user->save();
        }

        $destination = DestinationWithCharge::where('destination',$row['destination_branch'])->first();
        if($destination)
        {
            $destination_id = $destination->id;
            $destination_charge = $destination->charge;
            return new Order([

                'order_id' => 'ORD-'.$this->order_id,
                'added_by' =>Auth::guard('vendor')->user()->id,
                'user_id' =>$user->id,
                'branch_id' =>1,
                'destination_id' =>$destination_id,
                'receiver_name' =>$row['customer_name'],
                'receiver_phone' =>$row['phone_number'],
                'receiver_alt_phone' =>$row['alt_phone_number'],
                'receiver_address' =>$row['full_address'],
                'weight' =>1,
                'delivery_charge' =>$destination_charge ,
                'pickup_type' =>'asd',
                'cod_charge' =>$row['cod'],
                'package_access' =>'',
                'package_type' =>'',
                'remark' =>$row['order_description'],
                'payment_collection' =>'pending',
                'order_status' =>'order_created',
                'order_status_date' =>json_encode([['order_created'=>date('d-m-y H:i')]]),

            ]);
        }
    }
}

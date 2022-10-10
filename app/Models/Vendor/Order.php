<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id',
        'user_id',
        'branch_id',
        'destination_id',
        'receiver_name',
        'receiver_phone',
        'receiver_alt_phone',
        'receiver_address',
        'weight',
        'delivery_charge',
        'pickup_type',
        'cod_charge',
        'package_access',
        'package_type',
        'remark',
        'status'
    ];

}

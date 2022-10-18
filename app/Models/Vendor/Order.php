<?php

namespace App\Models\Vendor;

use App\Models\Admin\Branch;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\DestinationWithCharge;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id',
        'added_by',
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
        'priority',
        'vendor_reference_id',
        'delivery_instruction',
        'payment_collection',
        'order_status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function destination()
    {
        return $this->belongsTo(DestinationWithCharge::class,'destination_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'added_by','id');
    }

}

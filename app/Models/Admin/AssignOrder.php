<?php

namespace App\Models\Admin;

use App\Models\Vendor\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_id',
        'delivery_boy_id',
        'order_id'
    ];

    public function delivery_boy()
    {
        return $this->belongsTo(DeliveryBoy::class,'delivery_boy_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}

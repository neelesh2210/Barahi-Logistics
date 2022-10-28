<?php

namespace App\Models\Admin;

use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transfer_id',
        'vendor_id',
        'order_ids',
        'cod_amount',
        'delivery_charge',
        'total_amount',
        'collection_mode',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}

<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'address',
        'company_name',
        'registration_document',
        'pan_image'
    ];

}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'dl_number',
        'dl_image',
        'vechile_number',
        'password',
        'status',
    ];

}

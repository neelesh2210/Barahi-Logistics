<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DeliveryBoy extends Model
{
    use HasFactory,HasApiTokens;

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

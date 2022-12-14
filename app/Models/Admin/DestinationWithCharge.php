<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestinationWithCharge extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'destination',
        'charge'
    ];

}

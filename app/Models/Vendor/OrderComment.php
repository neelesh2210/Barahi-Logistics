<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_type',
        'user_id',
        'comment_type',
        'comment',
    ];
}

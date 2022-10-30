<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'vendor_id',
        'subject',
        'description',
        'status'
    ];
}

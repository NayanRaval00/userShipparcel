<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WearHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_title',
        'sender_name',
        'full_address',
        'phone',
        'pincode',
        'pick_address_id'
    ];
}

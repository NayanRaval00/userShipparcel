<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'invoice_number', 'name', 'issued_date', 'amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'rental_id',
        'provider',
        'token',
        'status',   // pending|settlement|deny|expire|cancel
        'amount',
        'payload',  // json response
    ];

    protected $casts = [
        'amount' => 'integer',
        'payload' => 'array',
    ];
}

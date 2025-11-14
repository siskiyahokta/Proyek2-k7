<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    protected $table = 'consoles';

    protected $fillable = [
        'name',
        'type',
        'status',        // available / rented
        'hourly_rate',
        'rented_until',  // nullable datetime
    ];

    protected $casts = [
        'hourly_rate' => 'integer',
        'rented_until' => 'datetime',
    ];
}

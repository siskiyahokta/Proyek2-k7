<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'rentals';

    protected $fillable = [
        'console_id',
        'user_id',
        'duration_hours',
        'start_at',
        'end_at',
        'total_price',
        'status',
        'order_id',
    ];

    protected $casts = [
        'duration_hours' => 'integer',
        'total_price' => 'integer',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function console()
    {
        return $this->belongsTo(Console::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

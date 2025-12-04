<?php

namespace App\Services;

use App\Models\Console;
use App\Models\Rental;
use Illuminate\Support\Carbon;

class RentalService
{
    public function createRental(Console $console, int $durationHours, ?int $userId = null): Rental
    {
        $startAt = now();
        $endAt   = (clone $startAt)->addHours($durationHours);

        return Rental::create([
            'console_id'     => $console->id,
            'user_id'        => $userId,
            'duration_hours' => $durationHours,
            'start_at'       => $startAt,
            'end_at'         => $endAt,
            'total_price'    => $console->hourly_rate * $durationHours,
            'status'         => 'pending',
            'order_id'       => 'order-' . uniqid(),
        ]);
    }
}

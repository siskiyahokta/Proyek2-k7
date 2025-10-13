<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Console;

class ConsoleSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];

        // 4 PS4 units @ e.g. 15000
        for ($i = 1; $i <= 4; $i++) {
            $rows[] = [
                'name' => "Unit $i",
                'type' => 'PS4',
                'status' => 'available',
                'hourly_rate' => 15000,
                'rented_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // 4 PS5 units @ e.g. 25000
        for ($i = 1; $i <= 4; $i++) {
            $rows[] = [
                'name' => "Unit $i",
                'type' => 'PS5',
                'status' => 'available',
                'hourly_rate' => 25000,
                'rented_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Upsert on (type,name)
        foreach ($rows as $row) {
            Console::updateOrCreate(
                ['type' => $row['type'], 'name' => $row['name']],
                $row
            );
        }
    }
}

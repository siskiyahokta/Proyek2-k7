<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ConsoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Console::truncate();
        
        DB::statement("
            INSERT INTO consoles (id, name, type, status, hourly_rate, rented_until, created_at, updated_at) VALUES
            (1, 'PS4 Unit 1', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (2, 'PS4 Unit 2', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (3, 'PS4 Unit 3', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (4, 'PS4 Unit 4', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (5, 'PS4 Unit 5', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (6, 'PS4 Unit 6', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (7, 'PS4 Unit 7', 'PS4', 'available', 10000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29'),
            (8, 'PS5 Unit 1', 'PS5', 'available', 15000, NULL, '2025-10-31 04:15:29', '2025-10-31 04:15:29');
        ");
        
        DB::statement('ALTER TABLE consoles AUTO_INCREMENT = 9;'); 
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
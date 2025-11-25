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
        // *START: Matikan pemeriksaan Foreign Key sementara*
        // Ini diperlukan karena kita akan menggunakan TRUNCATE dan INSERT dengan ID eksplisit.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 1. TRUNCATE/HAPUS DATA LAMA di tabel consoles
        // Memastikan tabel benar-benar bersih sebelum insert data awal.
        Console::truncate();
        
        // 2. INSERT DATA BARU DARI KIA MENGGUNAKAN RAW SQL
        // Data diambil dari bagian 'Dumping data for table consoles' di file SQL Anda.
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
        
        // 3. Reset AUTO_INCREMENT
        // Set nilai AUTO_INCREMENT menjadi ID berikutnya (9) agar data baru yang dibuat di dashboard tidak konflik.
        DB::statement('ALTER TABLE consoles AUTO_INCREMENT = 9;'); 

        // *END: Hidupkan kembali pemeriksaan Foreign Key*
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
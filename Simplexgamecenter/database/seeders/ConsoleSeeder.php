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
        // **START: Matikan pemeriksaan Foreign Key sementara**
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 1. TRUNCATE/HAPUS DATA LAMA
        Console::truncate(); 
        
        $rows = [];

        // ... (Kode generasi data baru PS4 & PS5 Anda di sini) ...

        // PS4: 7 Unit @ 10.000 per jam
        $ps4_unit_count = 7;
        $ps4_hourly_rate = 10000;
        
        for ($i = 1; $i <= $ps4_unit_count; $i++) {
            $rows[] = [
                'name' => "PS4 Unit $i",
                'type' => 'PS4',
                'status' => 'available',
                'hourly_rate' => $ps4_hourly_rate,
                'rented_until' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // PS5: 1 Unit @ 15.000 per jam
        $ps5_unit_count = 1;
        $ps5_hourly_rate = 15000;

        for ($i = 1; $i <= $ps5_unit_count; $i++) {
            $rows[] = [
                'name' => "PS5 Unit $i",
                'type' => 'PS5',
                'status' => 'available',
                'hourly_rate' => $ps5_hourly_rate,
                'rented_until' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // 4. INSERT DATA BARU
        DB::table('consoles')->insert($rows);

        // **END: Hidupkan kembali pemeriksaan Foreign Key**
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
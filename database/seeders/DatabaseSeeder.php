<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\GameSeeder;    // <-- BARIS INI DITAMBAHKAN
use Database\Seeders\ConsoleSeeder; // <-- Sudah ada, tetap dipakai

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Jalankan seeder lain (ConsoleSeeder dan GameSeeder)
        $this->call([
            ConsoleSeeder::class,
            GameSeeder::class,    // <-- PANGGILAN BARU DITAMBAHKAN DI SINI
        ]);

        // ✅ Buat akun admin default
        User::create([
            'name' => 'Admin Simplex',
            'email' => 'admin@gamecenter.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // (Opsional) Buat 1 user biasa untuk testing
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gamecenter.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
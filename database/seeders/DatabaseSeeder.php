<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\GameSeeder;    
use Database\Seeders\ConsoleSeeder; 

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ConsoleSeeder::class,
            GameSeeder::class,  
        ]);

        User::create([
            'name' => 'Admin Simplex',
            'email' => 'admin@gamecenter.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gamecenter.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
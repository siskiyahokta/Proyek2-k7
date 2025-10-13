<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call our console seeder so 8 units exist after seeding
        $this->call([
            ConsoleSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    AboutPage::create([
        'content' => '<h1>Simplex Game Center</h1><p>Deskripsi awal.</p>',
    ]);
}

}

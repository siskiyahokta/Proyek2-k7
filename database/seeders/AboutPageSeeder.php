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
    DB::table('about_page')->insert([
            'title' => 'Judul Halaman About Awal',
            'subtitle' => 'Ini adalah Subtitle',
            'main_content' => 'Konten utama halaman ini.',
            'created_at' => now(),
            'updated_at' => now(),
    ]);
}

}

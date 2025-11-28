<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('about_page', function (Blueprint $table) {
            $table->id();
            // Kolom untuk judul halaman
            $table->string('title')->nullable(); 
            // Kolom untuk konten utama halaman (menggunakan text karena panjang)
            $table->text('content')->nullable(); 
            // Kolom untuk gambar utama
            $table->string('image_path')->nullable(); 
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page');
    }
};

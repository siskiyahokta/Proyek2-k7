<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('developer')->nullable();
            $table->string('publisher')->nullable();
            $table->json('genres')->nullable();
            $table->text('storyline')->nullable();
            $table->integer('release_year')->nullable();
            $table->string('age_rating', 50)->nullable();
            $table->json('platforms')->nullable();
            $table->json('modes')->nullable();
            $table->integer('size_gb')->nullable();
            $table->json('languages')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->string('cover', 1024)->nullable();
            $table->json('screenshots')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};

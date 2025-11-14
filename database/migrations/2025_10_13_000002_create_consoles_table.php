<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // e.g. "Unit 1"
            $table->string('type');              // "PS4" or "PS5"
            $table->string('status')->default('available'); // available|rented
            $table->integer('hourly_rate');      // per-hour price
            $table->dateTime('rented_until')->nullable();
            $table->timestamps();

            $table->index(['type', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consoles');
    }
};

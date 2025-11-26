<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('about_page', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->text('subtitle')->nullable();
        $table->longText('main_content')->nullable();
        $table->string('hero_image')->nullable();

        // Bagian tim
        $table->string('team_1_name')->nullable();
        $table->string('team_1_role')->nullable();
        $table->string('team_1_image')->nullable();

        $table->string('team_2_name')->nullable();
        $table->string('team_2_role')->nullable();
        $table->string('team_2_image')->nullable();

        $table->string('team_3_name')->nullable();
        $table->string('team_3_role')->nullable();
        $table->string('team_3_image')->nullable();

        $table->timestamps();
    });
}
public function down()
{
    Schema::dropIfExists('about_page');
}
};
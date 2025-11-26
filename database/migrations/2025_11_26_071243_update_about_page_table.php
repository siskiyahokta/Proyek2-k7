<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('about_page', function (Blueprint $table) {

        $table->string('title')->nullable();
        $table->string('subtitle')->nullable();
        $table->longText('description')->nullable();

        $table->longText('mission')->nullable();
        $table->longText('vision')->nullable();

        // Team Section
        $table->string('team_owner_name')->nullable();
        $table->string('team_owner_photo')->nullable();

        $table->string('team_manager_name')->nullable();
        $table->string('team_manager_photo')->nullable();

        $table->string('team_staff_name')->nullable();
        $table->string('team_staff_photo')->nullable();

    });
}

public function down()
{
    Schema::table('about_page', function (Blueprint $table) {
        $table->dropColumn([
            'title','subtitle','description',
            'mission','vision',
            'team_owner_name','team_owner_photo',
            'team_manager_name','team_manager_photo',
            'team_staff_name','team_staff_photo'
        ]);
    });
}
};
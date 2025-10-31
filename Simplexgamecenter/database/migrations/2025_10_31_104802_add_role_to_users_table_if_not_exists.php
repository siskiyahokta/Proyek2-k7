<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasColumn('users', 'role')) {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('email');
        });
    }
}

public function down()
{
    if (Schema::hasColumn('users', 'role')) {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
};

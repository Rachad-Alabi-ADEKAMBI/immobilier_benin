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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 255)->after('id');
            $table->string('last_name', 255)->after('first_name');
            $table->integer('ads')->default(0)->after('last_name');
            $table->string('status', 255)->default('Disponible')->after('ads');
            $table->text('description')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('ads');
            $table->dropColumn('status');
            $table->dropColumn('description');
        });
    }
};

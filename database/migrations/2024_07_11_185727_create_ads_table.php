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
    Schema::create('ads', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->text('description'); // Changed to text
        $table->integer('price');
        $table->string('location');
        $table->integer('rooms')->nullable();
        $table->integer('bathrooms')->nullable(); // Changed to integer
        $table->integer('people')->nullable();
        $table->integer('size')->nullable();
        $table->string('action');
        $table->string('situation');
        $table->integer('views')->default(0);

        // Changed picture columns to text to avoid row size limit
        for ($i = 1; $i <= 10; $i++) {
            $table->text("pic{$i}")->nullable();
        }
        
        $table->foreignId('user_id')->nullable();
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};

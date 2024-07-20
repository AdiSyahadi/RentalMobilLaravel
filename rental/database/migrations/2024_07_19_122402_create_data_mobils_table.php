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
        Schema::create('data_mobils', function (Blueprint $table) {
            $table->id();
            $table->string('Images');
            $table->string('Mobil_Name');
            $table->decimal('Price', 10, 2);
            $table->integer('Luggage');
            $table->integer('Doors');
            $table->integer('Passenger');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mobils');
    }
};

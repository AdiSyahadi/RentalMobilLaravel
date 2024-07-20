<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSewaTable extends Migration
{
    public function up()
    {
        Schema::create('data_sewa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('data_mobils');
            $table->string('car_name');
            $table->string('name');
            $table->string('email');
            $table->string('whatsapp');
            $table->text('address');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_sewas');
    }
}


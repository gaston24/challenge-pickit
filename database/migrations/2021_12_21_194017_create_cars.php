<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('marca');
            $table->string('modelo');
            $table->integer('anio')->nullable();
            $table->string('patente')->unique()->nullable();
            $table->string('color')->nullable();

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServicioRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicioRequisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("requisito_id")->unsigned();
            $table->foreign('requisito_id')->references('id')->on('requisitos')->onDelete('cascade');
            $table->integer("servicio_id")->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->integer("estado")->default(1);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servicioRequisitos');
    }
}

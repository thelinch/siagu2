<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServicioSolicitadoRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obuServicio_requisitos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("requisito_id")->unsigned();
            $table->foreign('requisito_id')->references('id')->on('requisitos')->onDelete('cascade');
            $table->string("codigoMatricula", 44);
            $table->dateTime("fechaRegistro")->nullable();

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
        Schema::drop('alumno_requisitos');
    }
}

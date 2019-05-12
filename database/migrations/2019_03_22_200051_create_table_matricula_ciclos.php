<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatriculaCiclos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_ciclos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("codigo", 10);
            $table->dateTime("fecha_matricula");
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->integer('ciclo_academico_id')->unsigned();
            $table->foreign('ciclo_academico_id')->references('id')->on('ciclo_academicos');
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
        Schema::drop('matricula_ciclos');
    }
}

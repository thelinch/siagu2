<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadoArchivoAlumnoRequisitoArchivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_archivos_requisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archivo_alumno_requisito_id')->unsigned();
            $table->foreign('archivo_alumno_requisito_id')->references('id')->on('archivo_alumno_requisitos');
            $table->date("fechaRegistro")->nullable();
            $table->integer('estado_archivo_id')->unsigned();
            $table->foreign('estado_archivo_id')->references('id')->on('estado_archivos');
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
        Schema::drop('estado_archivo_alumno_requisito_archivo');
    }
}

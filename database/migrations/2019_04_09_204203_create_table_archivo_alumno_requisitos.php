<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArchivoAlumnoRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_alumno_requisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreOriginal');
            $table->string('nombreSistema');
            $table->string('url');
            $table->string('extension', 8);
            $table->integer("estado")->default(1);
            $table->integer('servicio_requisito_id')->unsigned();
            $table->foreign('servicio_requisito_id')->references('id')->on('servicio_solicitado_requisitos');
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
        Schema::drop('archivo_alumno_requisitos');
    }
}

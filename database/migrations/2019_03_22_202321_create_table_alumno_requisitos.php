<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnoRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_requisitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("alumno_id")->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
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

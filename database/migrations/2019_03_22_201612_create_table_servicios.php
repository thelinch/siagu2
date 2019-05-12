<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("estado")->default(1);
            $table->string("nombre", 150);
            $table->integer("total")->default(0);
            $table->string("codigoMatricula", 50);
            $table->integer("vacantesHombre")->default(0);
            $table->integer("vacantesMujer")->default(0);
            $table->boolean("activador")->default(false);
            $table->date("fechaInicio")->nullable();
            $table->date("fechaFin")->nullable();
            $table->integer("totalVacantesOcupados")->default(0);
            $table->integer("totalVacantesHombres")->nullable();
            $table->integer("totalVacantesMujeres")->nullable();
            $table->string("icono");
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
        Schema::drop('servicios');
    }
}

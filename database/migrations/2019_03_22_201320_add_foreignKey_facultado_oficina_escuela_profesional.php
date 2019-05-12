<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyFacultadoOficinaEscuelaProfesional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escuela_profesionales', function (Blueprint $table) {
            $table->integer('facultad_oficina_id')->unsigned();
            $table->foreign('facultad_oficina_id')->references('id')->on('facultad_oficinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escuela_profesionales', function (Blueprint $table) {
            //
        });
    }
}

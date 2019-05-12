<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDirectoresEscuelasProfesionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directores_escuelas_profesionales', function (Blueprint $table) {
            //
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->integer('escuela_profesional_id')->unsigned();
            $table->foreign('escuela_profesional_id')->references('id')->on('escuela_profesionales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directores_escuelas_profesionales', function (Blueprint $table) {
            //
        });
    }
}

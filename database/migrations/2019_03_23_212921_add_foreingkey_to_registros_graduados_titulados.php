<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToRegistrosGraduadosTitulados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros_graduados_titulados', function (Blueprint $table) {
            //
            $table->integer('alumno_graduado_id')->unsigned();
            $table->foreign('alumno_graduado_id')->references('id')->on('alumnos_graduados_titulados');

            $table->integer('tipo_diploma_id')->unsigned();
            $table->foreign('tipo_diploma_id')->references('id')->on('tipos_diplomas');

            $table->integer('rector_id')->unsigned();
            $table->foreign('rector_id')->references('id')->on('rectores');

            $table->integer('tipo_autoridad_id')->unsigned();
            $table->foreign('tipo_autoridad_id')->references('id')->on('tipos_autoridades');

            $table->integer('trabajador_areas_id')->unsigned();
            $table->foreign('trabajador_areas_id')->references('id')->on('trabajadores_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros_graduados_titulados', function (Blueprint $table) {
            //
        });
    }
}

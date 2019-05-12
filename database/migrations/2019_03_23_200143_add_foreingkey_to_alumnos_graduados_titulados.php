<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToAlumnosGraduadosTitulados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->integer('tipo_alumno_id')->unsigned();
            $table->foreign('tipo_alumno_id')->references('id')->on('tipos_alumnos');

            $table->integer('trabajo_investigacion_id')->unsigned();
            $table->foreign('trabajo_investigacion_id')->references('id')->on('trabajos_investigaciones');

            $table->integer('denominacion_grado_titulo_id')->unsigned();
            $table->foreign('denominacion_grado_titulo_id')->references('id')->on('denominaciones_grados_titulos');

            $table->integer('nombre_programa_estudio_id')->unsigned();
            $table->foreign('nombre_programa_estudio_id')->references('id')->on('nombres_programas_estudios');

            $table->integer('modalidad_estudio_id')->unsigned();
            $table->foreign('modalidad_estudio_id')->references('id')->on('modalidades_estudios');

            $table->integer('revalidacion_grado_id')->unsigned();
            $table->foreign('revalidacion_grado_id')->references('id')->on('revalidacion_grados');
            
            $table->integer('segunda_especialidad_id')->unsigned();
            $table->foreign('segunda_especialidad_id')->references('id')->on('segundas_especialidades');

            $table->integer('obtencion_grado_titulo_id')->unsigned();
            $table->foreign('obtencion_grado_titulo_id')->references('id')->on('obtencion_grados_titulos');

            $table->integer('grado_extranjero_id')->unsigned();
            $table->foreign('grado_extranjero_id')->references('id')->on('grados_extranjeros');

            $table->integer('registro_programa_id')->unsigned();
            $table->foreign('registro_programa_id')->references('id')->on('registros_programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
        });
    }
}

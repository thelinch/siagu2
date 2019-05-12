<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnosGraduadosTitulados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_graduados_titulados', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('alumno_general_id',10)->nullable();
            $table->string('procedencia_bachiller')->nullable();
            $table->string('procednecia_titulo_pedagogico')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_egreso')->nullable();
            $table->integer('estado')->default(1)->nullable();
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
        Schema::drop('alumnos_graduados_titulados');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegistrosGraduadosTitulados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_graduados_titulados', function (Blueprint $table) {
            $table->increments('id');

            $table->string('numero_oficio', 30)->nullable();
            $table->string('numero_resolucion', 30)->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->string('numero_diploma', 30)->nullable();
            $table->date('fecha_emison_diploma')->nullable();
            $table->string('registro_libro', 10)->nullable();
            $table->string('registro_folio', 20)->nullable();
            $table->string('numero_registro', 20)->nullable();
            $table->integer('director_decano_id')->nullable();
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
        Schema::drop('registros_graduados_titulados');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores_areas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('sueldo', 20)->nullable();
            $table->date('fecha_contrato_inicio')->nullable();
            $table->date('fecha_contrato_fin')->nullable();
            $table->string('resolucion', 45)->nullable();
            $table->string('codigo_resolucion', 45)->nullable();
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
        Schema::drop('trabajadores_areas');
    }
}

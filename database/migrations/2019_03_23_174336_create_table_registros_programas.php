<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegistrosProgramas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_programas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('fecha_matricula')->nullable();
            $table->date('fecha_inicio_programa')->nullable();
            $table->date('fecha_termino_programa')->nullable();
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
        Schema::drop('registros_programas');
    }
}

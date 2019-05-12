<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre', 50)->nullable();
            $table->string('apellido_paterno', 45)->nullable();
            $table->string('apellido_materno', 30)->nullable();                
            $table->string('sexo', 1)->nullable();
            $table->string('foto', 255)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('pais', 45)->nullable();
            $table->string('numero_documento', 50)->nullable();
            $table->string('direccion', 50)->nullable();
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
        Schema::drop('personas');
    }
}

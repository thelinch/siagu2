<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosExternosPosgrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_externos_posgrados', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('codigo', 15)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('telefono', 20)->nullable();
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
        Schema::drop('alumnos_externos_posgrados');
    }
}

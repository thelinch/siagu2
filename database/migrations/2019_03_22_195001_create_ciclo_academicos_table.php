<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicloAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclo_academicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre", 6);
            $table->string("año", 6);
            $table->dateTime("fecha_inicio");
            $table->dateTime("fecha_fin");
            $table->integer("estado")->default(1);
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
        Schema::drop('ciclo_academicos');
    }
}

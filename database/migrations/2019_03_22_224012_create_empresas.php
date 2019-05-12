<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('ruc', 15)->nullable();
            $table->string('nombre', 150)->nullable();
            $table->string('sigla', 10)->nullable();                
            $table->string('sector', 10)->nullable();
            $table->string('codigo', 20)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('url_pagina', 255)->nullable();
            $table->string('direccion', 50)->nullable();
            $table->string('pais', 45)->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::drop('empresas');
    }
}

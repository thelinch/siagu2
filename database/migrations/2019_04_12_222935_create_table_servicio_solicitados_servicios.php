<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServicioSolicitadosServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitado_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_solicitado_id')->unsigned();
            $table->foreign('servicio_solicitado_id')->references('id')->on('servicio_solicitados');
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
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
        Schema::drop('solicitado_servicios');
    }
}

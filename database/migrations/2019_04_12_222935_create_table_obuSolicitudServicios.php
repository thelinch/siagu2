<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableobuSolicitudServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obuSolicitud_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('obuSolicitud_id')->unsigned();
            $table->foreign('obuSolicitud_id')->references('id')->on('obuSolicitudes');
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

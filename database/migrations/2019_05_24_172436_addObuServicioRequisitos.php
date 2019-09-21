<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObuServicioRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obuServicio_requisitos', function (Blueprint $table) {
            //
            $table->integer('obu_solicitud_id')->unsigned();
            $table->foreign('obu_solicitud_id')->references('id')->on('obuSolicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicio_solicitado_requisitos', function (Blueprint $table) {
            //
        });
    }
}

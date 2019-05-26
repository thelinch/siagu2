<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicioSolicitadoIdToServicioSolicitadoRequisitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicio_solicitado_requisitos', function (Blueprint $table) {
            //
            $table->integer('servicio_solicitado_id')->unsigned();
            $table->foreign('servicio_solicitado_id')->references('id')->on('servicio_solicitados');
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

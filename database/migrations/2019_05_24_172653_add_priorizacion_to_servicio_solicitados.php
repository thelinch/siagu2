<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriorizacionToServicioSolicitados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicio_solicitados', function (Blueprint $table) {
            //
            $table->boolean("priorizacion")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicio_solicitados', function (Blueprint $table) {
            //
        });
    }
}

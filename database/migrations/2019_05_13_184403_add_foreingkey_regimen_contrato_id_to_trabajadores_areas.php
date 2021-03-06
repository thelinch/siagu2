<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyRegimenContratoIdToTrabajadoresAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadores_areas', function (Blueprint $table) {
            //
            $table->integer('regimen_contrato_id')->unsigned();
            $table->foreign('regimen_contrato_id')->references('id')->on('regimen_contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajadores_areas', function (Blueprint $table) {
            //
        });
    }
}

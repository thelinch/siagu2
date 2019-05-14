<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyAdministrativoIdToTrabajadorAreas extends Migration
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
            $table->integer('administrativo_id')->unsigned();
            $table->foreign('administrativo_id')->references('id')->on('administrativos');
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

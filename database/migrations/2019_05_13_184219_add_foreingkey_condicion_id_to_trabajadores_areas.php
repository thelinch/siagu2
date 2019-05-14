<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyCondicionIdToTrabajadoresAreas extends Migration
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
            $table->integer('condicion_trabajador_id')->unsigned();
            $table->foreign('condicion_trabajador_id')->references('id')->on('condicion_trabajadores');
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

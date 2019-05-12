<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDirectoresPosgrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directores_posgrados', function (Blueprint $table) {
            //
            $table->integer('unidad_posgrado_id')->unsigned();
            $table->foreign('unidad_posgrado_id')->references('id')->on('unidades_posgrados');
            $table->integer('trabajador_area')->unsigned();
            $table->foreign('trabajador_area')->references('id')->on('trabajadores_areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directores_posgrados', function (Blueprint $table) {
            //
        });
    }
}

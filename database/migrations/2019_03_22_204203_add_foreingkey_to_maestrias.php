<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToMaestrias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maestrias', function (Blueprint $table) {
            //
            $table->integer('unidad_posgrado_id')->unsigned();
            $table->foreign('unidad_posgrado_id')->references('id')->on('unidades_posgrados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maestrias', function (Blueprint $table) {
            //
        });
    }
}

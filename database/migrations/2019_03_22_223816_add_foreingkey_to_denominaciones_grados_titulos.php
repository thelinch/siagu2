<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDenominacionesGradosTitulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('denominaciones_grados_titulos', function (Blueprint $table) {
            //
            $table->integer('mencion_maestria_id')->unsigned();
            $table->foreign('mencion_maestria_id')->references('id')->on('menciones_maestrias');

            $table->integer('escuela_profesional_id')->unsigned();
            $table->foreign('escuela_profesional_id')->references('id')->on('escuela_profesionales');
            
            $table->integer('grado_titulo_id')->unsigned();
            $table->foreign('grado_titulo_id')->references('id')->on('grados_titulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('denominaciones_grados_titulos', function (Blueprint $table) {
            //
        });
    }
}

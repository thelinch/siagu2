<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeinkeyToEstudioADenominacionGradosTitulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios', function (Blueprint $table) {
            $table->integer('denominacion_grado_id')->unsigned();
            $table->foreign('denominacion_grado_id')->references('id')->on('denominaciones_grados_titulos'); 
           //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyGradosTitulosToGradosTitulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
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
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
        });
    }
}

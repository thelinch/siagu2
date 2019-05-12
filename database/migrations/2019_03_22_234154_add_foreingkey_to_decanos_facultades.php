<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDecanosFacultades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decanos_facultades', function (Blueprint $table) {
            //
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->integer('facultad_oficina_id')->unsigned();
            $table->foreign('facultad_oficina_id')->references('id')->on('facultad_oficinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('decanos_facultades', function (Blueprint $table) {
            //
        });
    }
}

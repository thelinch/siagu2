<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamentos', function (Blueprint $table) {
           
            $table->integer('facultad_oficina_id')->unsigned();
            $table->foreign('facultad_oficina_id')->references('id')->on('facultad_oficinas');
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
        Schema::table('departamentos', function (Blueprint $table) {
            //
        });
    }
}

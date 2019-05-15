<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDocenteDepartamentoACargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_departamentos', function (Blueprint $table) {
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');
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
        Schema::table('docente_departamentos', function (Blueprint $table) {
            //
        });
    }
}

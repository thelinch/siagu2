<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDocenteDepartamentoADepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_departamentos', function (Blueprint $table) {
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos');  //
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

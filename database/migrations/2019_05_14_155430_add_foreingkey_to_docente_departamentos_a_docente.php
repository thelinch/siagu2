<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDocenteDepartamentosADocente extends Migration
{
    /**
     * AddForeingkeyToDocente
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_departamentos', function (Blueprint $table) {
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');  //
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

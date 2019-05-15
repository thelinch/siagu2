<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToDocenteDepartamentoACategoriaDocentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docente_departamentos', function (Blueprint $table) {
            $table->integer('categoria_docente_id')->unsigned();
            $table->foreign('categoria_docente_id')->references('id')->on('categoria_docentes');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToEvalucionDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluacion_docentes', function (Blueprint $table) {
            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');
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
        Schema::table('evaluacion_docentes', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_resolucion',40);
            $table->date('fecha_resolucion');
            $table->string('url_resolucion',255);
            $table->string('estado',15)->default(1);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluacion_docentes');
    }
}

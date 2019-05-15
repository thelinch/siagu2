<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sueldo',15);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->string('numero_resolucion',15);
            $table->string('url_resolucion',255);
            $table->string('estado',5)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('docente_departamentos');
    }
}

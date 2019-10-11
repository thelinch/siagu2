<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstadoServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->enum("nombre", array("Registrado", "Enviado", "Aceptado", "Observado"));
            $table->integer("estado")->default(1);
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
        Schema::drop('estado_servicios');
    }
}

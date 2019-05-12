<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequisitoTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitoTipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("requisito_id")->unsigned();
            $table->foreign('requisito_id')->references('id')->on('requisitos')->onDelete('cascade');
            $table->integer("tipo_id")->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
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
        Schema::drop('requisitoTipos');
    }
}

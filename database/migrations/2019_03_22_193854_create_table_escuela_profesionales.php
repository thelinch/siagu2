<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEscuelaProfesionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuela_profesionales', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre", 60);
            $table->string("siglas");
            $table->integer("creditos");
            $table->string("plan_estudios_url")->nullable();
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
        Schema::drop('escuela_profesionales');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDedicacionDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dedicacion_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('sigla',10);
            $table->integer('estado')->default(1);      
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
        Schema::drop('dedicacion_docentes');
    }
}

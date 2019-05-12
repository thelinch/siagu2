<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubigeos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codigo', 7)->nullable();
            $table->string('distrito', 45)->nullable();
            $table->string('provincia', 45)->nullable();                
            $table->string('departamento', 45)->nullable();
            $table->string('poblacion', 15)->nullable();
            $table->string('superficie',15)->nullable();
            $table->string('y', 20)->nullable();
            $table->string('x', 20)->nullable();
            $table->integer('estado')->default(1)->nullable();
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
        Schema::drop('ubigeos');
    }
}

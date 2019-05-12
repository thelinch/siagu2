<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMencionesMaestriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menciones_maestrias', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nombre', 255)->nullable();
            $table->integer('creditos')->nullable();
            $table->string('plan_estudios',255)->nullable();                
            $table->string('siglas', 10)->nullable();
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
        Schema::drop('menciones_maestrias');
    }
}

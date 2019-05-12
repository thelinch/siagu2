<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTrabajosInvestigaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos_investigaciones', function (Blueprint $table) {
            $table->increments('id');
            
            $table->text('nombre')->nullable();
            $table->string('url', 255)->nullable();
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
        Schema::drop('trabajos_investigaciones');
    }
}

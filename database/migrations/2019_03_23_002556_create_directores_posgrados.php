<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoresPosgrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directores_posgrados', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('fecha_periodo_inicio')->nullable();
            $table->date('fecha_periodo_fin')->nullable();
            $table->integer('estado')->default(1)->nullable();
            $table->nullableTimestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directores_posgrados');
    }
}

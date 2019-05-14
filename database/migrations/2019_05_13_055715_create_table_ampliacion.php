<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAmpliacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ampliaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("total");
            $table->integer("mujer");
            $table->integer("varon");
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');
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
        Schema::dropIfExists('ampliaciones');
    }
}

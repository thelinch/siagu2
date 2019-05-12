<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArchivosObu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisito_archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombreOriginalArchivo");
            $table->string("nombreSistemaArchivo");
            $table->integer('requisito_id')->unsigned();
            $table->foreign('requisito_id')->references('id')->on('requisitos');
            $table->string("url");
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
        Schema::drop("requisito_archivos");
    }
}

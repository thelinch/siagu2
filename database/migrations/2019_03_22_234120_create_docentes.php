<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('codigo', 50)->nullable();
            $table->string('correo_institucional', 50)->nullable();
            $table->string('numero_colegiatura', 20)->nullable();                
            $table->string('url_cv',255)->nullable();
            $table->string('codigo_essalud', 20)->nullable();
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
        Schema::drop('docentes');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModalidadesEstudios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidades_estudios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nombre',45)->nullable();
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
        Schema::drop('modalidades_estudios');
    }
}

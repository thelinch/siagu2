<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 30);
            $table->string('correo_institucional', 50);
            $table->string("numero_colegiatura", 20);
            $table->string('url_cv', 255);
            $table->string("codigo_essalud", 20);
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
        Schema::drop('administrativos');
    }
}

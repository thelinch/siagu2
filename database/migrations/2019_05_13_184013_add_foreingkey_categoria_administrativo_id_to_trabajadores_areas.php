<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyCategoriaAdministrativoIdToTrabajadoresAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajadores_areas', function (Blueprint $table) {
            //
            $table->integer('categoria_administrativo_id')->unsigned();
            $table->foreign('categoria_administrativo_id')->references('id')->on('categorias_administrativos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajadores_areas', function (Blueprint $table) {
            //
        });
    }
}

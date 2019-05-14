<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoYFechaRegistroToAmpliacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ampliaciones', function (Blueprint $table) {
            //
            $table->integer("estado")->default(1);
            $table->dateTime("fechaRegistro");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ampliaciones', function (Blueprint $table) {
            //
        });
    }
}

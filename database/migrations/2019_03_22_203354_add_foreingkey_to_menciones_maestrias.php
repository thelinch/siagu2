<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyToMencionesMaestrias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menciones_maestrias', function (Blueprint $table) {
            //
            $table->integer('maestrias_id')->unsigned();
            $table->foreign('maestrias_id')->references('id')->on('maestrias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menciones_maestrias', function (Blueprint $table) {
            //
        });
    }
}

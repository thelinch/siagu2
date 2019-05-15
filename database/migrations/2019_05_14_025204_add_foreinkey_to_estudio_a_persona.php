<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeinkeyToEstudioAPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios', function (Blueprint $table) {
           
            //
        });
    }
}

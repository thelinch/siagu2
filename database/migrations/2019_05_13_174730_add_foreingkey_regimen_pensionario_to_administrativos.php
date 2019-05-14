<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingkeyRegimenPensionarioToAdministrativos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administrativos', function (Blueprint $table) {
            //
            $table->integer('regimen_pensionario_id')->unsigned();
            $table->foreign('regimen_pensionario_id')->references('id')->on('regimen_pensionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrativos', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Doctrine\DBAL\Schema\Table;

class CreateRegimenPensionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimen_pensionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_cuspp', 15);
            $table->string('nombre', 50);
            $table->dateTime("fecha_inicio");
            $table->string("tipo_regimen_pensionario", 15);
            $table->string("entidad_afp", 60);
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
        Schema::drop('regimen_pensionarios');
    }
}

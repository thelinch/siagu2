<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadogradotituladoToAlumnosGraduadosTitulados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
            $table->string('estadograduado',1)->default(1)->nullable()->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos_graduados_titulados', function (Blueprint $table) {
            //
        });
    }
}

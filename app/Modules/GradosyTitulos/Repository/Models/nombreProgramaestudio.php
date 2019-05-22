<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class nombreProgramaestudio extends Model
{
    //

    protected $table = "nombres_programas_estudios";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function AlumnoGraduadoTitulado()
    {
        return $this->hasMany(alumnoGraduadoTitulado::class);
    }
}

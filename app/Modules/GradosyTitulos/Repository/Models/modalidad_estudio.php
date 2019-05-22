<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class modalidad_estudio extends Model
{
    //

    protected $table = "modalidades_estudios";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function AlumnoGraduadoTitulado()
    {
        return $this->hasMany(alumnoGraduadoTitulado::class);
    }
}

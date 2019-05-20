<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_diploma extends Model
{
    protected $table = "tipos_diplomas";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function RegistroAlumnoGraduadoTitulado()
    {
        return  $this->hasMany(registroAlumnoGraduadoTitulado::class);
    }
}

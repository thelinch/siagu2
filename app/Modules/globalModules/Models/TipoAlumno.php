<?php

namespace App\Modules\globalModules\Models;

use Illuminate\Database\Eloquent\Model;

class tipoAlumno extends Model
{
    protected $table = "tipos_alumnos";
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}

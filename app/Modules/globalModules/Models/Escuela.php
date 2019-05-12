<?php

namespace App\Modules\globalModules\Models;


use Illuminate\Database\Eloquent\Model;
use App\Modules\BienestarUniversitario\Repository\Models\Alumno;

class Escuela extends Model
{
    //
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}

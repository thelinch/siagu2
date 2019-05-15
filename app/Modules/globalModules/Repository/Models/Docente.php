<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $table = "docentes";
    protected $casts = [
        "estado" => "boolean",
    ];
    public function alumnos()
    {
        return $this->hasMany(Alumno::Class);
    }
    public function Persona()
    {
        return $this->belongsTo(Persona::class);
    }
}

<?php

namespace App\Modules\globalModules\Models;

use Illuminate\Database\Eloquent\Model;

class EscuelaProfesionale extends Model
{
    //
    protected $table = "escuela_profesionales";
    protected $casts = [
        "estado" => "boolean",
    ];
    public function alumnos()
    {
        return $this->hasMany(Alumno::Class);
    }
    public function facultad_oficina()
    {
        return $this->belongsTo(FacultadOficina::class);
    }
}

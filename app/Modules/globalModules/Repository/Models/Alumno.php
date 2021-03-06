<?php

namespace App\Modules\globalModules\Repository\Models;

use App\Modules\BienestarUniversitario\Repository\Models\ObuSolicitud;
use Illuminate\Database\Eloquent\Model;


class Alumno extends Model
{
    //
    protected $table = "alumnos";
    protected $casts = [
        "estado" => "boolean",
        "grado_alumno" => "boolean",
    ];
    protected $fillable = ['codigo', "correo_institucional", "escuela_profesional_id", "tipo_alumno_id", "grado_alumno"];
    public function serviciosSolicitados()
    {
        return $this->hasMany(ObuSolicitud::class);
    }
    public function escuelaProfesional()
    {
        return $this->belongsTo(EscuelaProfesionale::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function tipoAlumno()
    {
        return $this->belongsTo(TipoAlumno::class);
    }
}

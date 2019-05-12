<?php

namespace App\Modules\globalModules\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Escuela;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;
use App\Modules\BienestarUniversitario\Repository\Models\AlumnoRequisito;

class Alumno extends Model
{
    //
    protected $casts = [
        "estado" => "boolean",
        "grado_alumno" => "boolean",
    ];
    public function serviciosSolicitados()
    {
        return $this->hasMany(ServicioSolicitado::class);
    }
    public function escuelaProfesional()
    {
        return $this->belongsTo(EscuelaProfesionale::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, "alumno_requisitos", "alumno_id", "requisito_id")->withPivot("codigoMatricula", "fechaRegistro");
    }
    public function alumnoRequisitos()
    {
        return $this->hasMany(AlumnoRequisito::class);
    }
    public function tipoAlumno()
    {
        return $this->belongsTo(tipoAlumno::class);
    }
}

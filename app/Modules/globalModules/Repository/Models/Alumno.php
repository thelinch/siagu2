<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;
use App\Modules\BienestarUniversitario\Repository\Models\AlumnoRequisito;
use App\Modules\globalModules\Models\FacultadOficina;

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
 
    public function alumnoRequisitos()
    {
        return $this->hasMany(AlumnoRequisito::class);
    }
    public function tipoAlumno()
    {
        return $this->belongsTo(tipoAlumno::class);
    }
    
}

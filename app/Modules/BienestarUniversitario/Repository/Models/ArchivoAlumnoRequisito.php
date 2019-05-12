<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivoAlumnoRequisito extends Model
{
    //
    protected $table = "archivo_alumno_requisitos";

    public function alumnoRequisito()
    {
        return $this->belongsTo(alumnoRequisito::class);
    }
    public function estadosArchivo()
    {
        return $this->belongsToMany(EstadoArchivo::class, "estado_archivos_requisitos", "archivo_alumno_requisito_id", "estado_archivo_id")->withPivot("fechaRegistro", "estado");
    }
}

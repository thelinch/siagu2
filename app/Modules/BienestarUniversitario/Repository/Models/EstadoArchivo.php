<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoArchivo extends Model
{
    //
    protected $table = "estado_archivos";
    public function archivos()
    {
        return $this->belongsToMany(ArchivoAlumnoRequisito::class, "estado_archivos_requisitos", "estado_archivo_id", "archivo_alumno_requisito_id");
    }
}

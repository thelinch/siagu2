<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class estadoArchivoRequisito extends Model
{
    protected $table = "estado_archivos_requisitos";
    protected $date = [
        "fechaRegistro"
    ];
    protected $casts = [
        "estado" => "boolean"
    ];
    public function archivoAlumnoRequisito()
    {
        return $this->belongsTo(ArchivoAlumnoRequisito::class);
    }
    public function estadoArchivo()
    {
        return $this->belongsTo(EstadoArchivo::class);
    }
}

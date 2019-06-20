<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\globalModules\Models\Alumno;
use Illuminate\Database\Eloquent\Model;

class ServicioSolicitadoRequisito extends Model
{
    //
    protected $table = "servicio_solicitado_requisitos";
    protected $fillable = ["codigoMatricula", "fechaRegistro", "requisito_id"];
    protected $dates = [
        "fechaRegistro"
    ];
    public function archivos()
    {
        return $this->hasMany(ArchivoAlumnoRequisito::class);
    }
    public function requisito()
    {
        return $this->belongsTo(Requisito::class, "requisito_id");
    }
    public function servicioSolicitado()
    {
        return $this->belongsTo(ServicioSolicitado::class);
    }
}

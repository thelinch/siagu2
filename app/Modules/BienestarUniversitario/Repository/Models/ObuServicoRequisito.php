<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use Illuminate\Database\Eloquent\Model;

class ObuServicioRequisito extends Model
{
    //
    protected $table = "obuservicio_requisitos";
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
        return $this->belongsTo(ObuSolicitud::class);
    }
}

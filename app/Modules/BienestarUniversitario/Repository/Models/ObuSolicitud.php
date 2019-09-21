<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\globalModules\Repository\Models\Alumno;

class ObuSolicitud extends Model
{
    //
    protected $table = "obusolicitudes";
    protected $fillable = ["alumno_id", "estado_servicio_id", "fechaRegistro", "codigoMatricula", "priorizacion"];
    protected $date = [
        "fechaRegistro"
    ];
    protected $casts = [
        "estado" => "boolean",
        "priorizacion" => "boolean"
    ];
    public function estadoServicio()
    {
        return $this->belongsTo(EstadoServicio::class, "estado_servicio_id");
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, "obusolicitud_servicios", "obu_solicitud_id", "servicio_id")->withPivot("estado")->wherePivot("estado", "=", 1);
    }
    public function alumno()
    {
        return  $this->belongsTo(Alumno::class);
    }
    public function serviciSolicitadoRequisitos()
    {
        return $this->hasMany(ObuServicioRequisito::class);
    }
    public function servicioSolicitadoRequisitos()
    {
        return $this->hasMany(ObuServicioRequisito::class);
    }
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, "obuservicio_requisitos", "obu_solicitud_id", "requisito_id");
    }
}

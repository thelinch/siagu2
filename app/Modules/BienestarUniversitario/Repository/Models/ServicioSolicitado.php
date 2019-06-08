<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\globalModules\Models\Alumno;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;

class ServicioSolicitado extends Model
{
    //
    protected $table = "servicio_solicitados";
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
        return $this->belongsToMany(Servicio::class, "solicitado_servicios", "servicio_solicitado_id", "servicio_id")->withPivot("estado")->wherePivot("estado", "=", 1);
    }
    public function alumno()
    {
        return  $this->belongsTo(Alumno::class);
    }
    public function serviciSolicitadoRequisitos()
    {
        return $this->hasMany(ServicioSolicitadoRequisito::class);
    }
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, "servicio_solicitado_requisitos", "servicio_solicitado_id", "requisito_id");
    }
}

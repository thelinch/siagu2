<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\globalModules\Repository\Models\cicloAcademico;

class Servicio extends Model
{
    //
    protected $fillable = ['nombre', 'total', 'divisio_personas', 'codigoMatricula', 'vacantesHombre', 'vacantesMujer', "icono", "fechaInicio", "fechaFin", "activador"];
    protected $date = ["fechaFin", "fechaInicio"];
    protected $casts = [
        "fechaInicio" => "date:Y-m-d",
        "fechaFin" => "date:Y-m-d",
        "activador" => "boolean",
        "estado" => "boolean",
        "divisio_personas" => "boolean"
    ];
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, "serviciorequisitos", "servicio_id", "requisito_id")->wherePivot("estado", "=", '1');
    }
    public function ampliaciones()
    {
        return $this->hasMany(Ampliacion::class)->where([["estado", "=", 1]]);
    }
    public function ampliacionActual()
    {
        return $this->hasOne(Ampliacion::class)->where("estado", "=", 1)->where("codigoMatricula", "=", $this->codigoMatricula);
    }
    public function cicloAcademicoActual()
    {
        return $this->hasOne(cicloAcademicoServicios::class)->where("vigencia", "=", true);
    }
    public function ciclosAcademicos()
    {
        return $this->belongsToMany(cicloAcademico::class, "ciclo_academico_servicios", "servicio_id", "ciclo_academico_id");
    }
}

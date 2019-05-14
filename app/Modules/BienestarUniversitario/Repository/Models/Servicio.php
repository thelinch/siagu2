<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\globalModules\Models\Alumno;

class Servicio extends Model
{
    //
    protected $fillable = ['nombre', 'total', 'codigoMatricula', 'vacantesHombre', 'vacantesMujer', "icono", "fechaInicio", "fechaFin", "activador"];
    protected $date = ["fechaFin", "fechaInicio"];
    protected $casts = [
        "fechaInicio" => "date:Y-m-d",
        "fechaFin" => "date:Y-m-d",
        "activador" => "boolean",
        "estado" => "boolean"
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
}

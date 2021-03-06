<?php

namespace App\Modules\bienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\BienestarUniversitario\Repository\Models\Tipo;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;
use App\Modules\BienestarUniversitario\Repository\Models\RequisitoArchivos;
use App\Modules\globalModules\Models\Alumno;
use App\Modules\BienestarUniversitario\Repository\Models\requisitoArchivo;

class Requisito extends Model
{
    //
    protected $table = "requisitos";
    protected $fillable = ['nombre', 'descripcion', 'prioridad', 'requerido', 'tipoArchivo', "estado", "tipo_id", "nombreArchivo"];
    protected $casts = [
        "estado" => "boolean",
        "requerido" => "boolean",
        "prioridad" => "boolean"
    ];
    public function tipos()
    {
        return $this->belongsToMany(Tipo::class, "requisitotipos", "requisito_id", "tipo_id")->withPivot("actualizacion", "numero_anios_actualizacion")->wherePivot("estado", "=", 1)->using(pivotRequisitoTipo::class);
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, "serviciorequisitos", "requisito_id", "servicio_id")->wherePivot("estado", "=", 1);
    }
    public function archivos()
    {
        return $this->hasMany(RequisitoArchivos::class)->where("estado", true);
    }
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, "alumno_requisitos", "requisito_id", "alumno_id")->withPivot("codigoMatricula", "fechaRegistro");
    }
}

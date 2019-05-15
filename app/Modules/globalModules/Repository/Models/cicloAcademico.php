<?php


namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;

class cicloAcademico extends Model
{
    protected $table = "ciclo_academicos";
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, "ciclo_academico_servicios", "ciclo_academico_id", "servicio_id")->wherePivot("vigencia", "=", true);
    }
}

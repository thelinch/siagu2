<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\globalModules\Models\CicloAcademico;

class cicloAcademicoServicios extends Model
{
    protected $table = "ciclo_academico_servicios";
    public function cicloAcademico()
    {
        return $this->belongsTo(CicloAcademico::class);
    }
}

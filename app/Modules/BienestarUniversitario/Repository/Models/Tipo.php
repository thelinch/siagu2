<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;

class Tipo extends Model
{
    //
    protected $fillable = ['nombre', 'icono', 'estado'];
    public function requisitos()
    {
        return $this->belongsToMany(Requisito::class, "requisitotipos","tipo_id","requisito_id")->withPivot("estado")->wherePivot("estado",1);
    }
}

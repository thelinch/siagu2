<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoServicio extends Model
{
    //
    protected $table = "estado_servicios";

    public function servicios()
    {
        return $this->hasMany(AlumnoServicio::class);
    }
}

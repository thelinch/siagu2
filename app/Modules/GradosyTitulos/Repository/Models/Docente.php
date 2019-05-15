<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\globalModules\Models\Persona;

class Docente extends Model
{
    protected $table = "docentes";
    protected $casts = [
        "estado" => "boolean",
    ];
    public function personas()
    {
        return $this->hasOne(Persona::class);
    }
}

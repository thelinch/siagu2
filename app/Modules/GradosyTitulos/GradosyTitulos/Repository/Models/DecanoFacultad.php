<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquentr\Model\Docente;

class DecanoFacultad extends Model
{
    protected $table = "decanos_facultades";
    protected $casts = [
        "estado" => "boolean",
    ];
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
}

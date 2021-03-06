<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $table = "docentes";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function Persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function DecanoFacultad()
    {
        return $this->belongsTo(DecanoFacultad::Class);
    }

    public function Rector()
    {
        return $this->belongsTo(Rector::Class);
    }
}

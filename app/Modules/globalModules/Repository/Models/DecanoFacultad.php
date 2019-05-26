<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class DecanoFacultad extends Model
{
    //
    protected $table = "decanos_facultades";
    protected $casts = [
        "estado" => "boolean",
    ];

  

    public function Docente()
    {
        return $this->belongsTo(Docente::Class);
    }
}

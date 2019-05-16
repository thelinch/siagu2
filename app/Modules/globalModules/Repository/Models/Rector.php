<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Rector extends Model
{
    //
    protected $table = "rectores";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function Persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function Docente()
    {
        return $this->belongsTo(Docente::Class);
    }

    
}

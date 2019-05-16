<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class administrativos extends Model
{
    //
    protected $table = "administrativos";
    protected $casts = [
        "estado" => "boolean",
    ];

    public function Persona()
    {
        return $this->belongsTo(Persona::class);
    }

   
}

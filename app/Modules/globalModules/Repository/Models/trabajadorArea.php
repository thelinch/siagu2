<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class trabajadorArea extends Model
{
    //
    protected $table = "trabajadores_areas";
    protected $casts = [
        "estado" => "boolean",
    ];


    public function administrativo()
    {
        return $this->belongsTo(administrativos::Class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    
}

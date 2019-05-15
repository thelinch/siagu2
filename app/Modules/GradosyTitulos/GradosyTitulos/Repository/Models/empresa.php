<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    //

    protected $table = "empresas";
    protected $casts = [
        "estado" => "boolean",
    ];
}

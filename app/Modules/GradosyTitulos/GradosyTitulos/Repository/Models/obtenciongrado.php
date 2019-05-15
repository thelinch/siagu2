<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class obtenciongrado extends Model
{
    //

    protected $table = "obtencion_grados_titulos";
    protected $casts = [
        "estado" => "boolean",
    ];
}

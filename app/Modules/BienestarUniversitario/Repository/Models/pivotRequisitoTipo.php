<?php

namespace App\Modules\bienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class pivotRequisitoTipo extends Pivot
{
    protected $casts = [
        "actualizacion" => "boolean"
    ];
}

<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitoTipo extends Model
{
    protected $table = "requisitotipos";
    protected $fillable = ['requisito_id', 'tipo_id', 'estado'];
    protected $casts = [
        "estado" => "boolean",
        "actualizacion" => "boolean"
    ];
    //
}

<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class gradoTitulo extends Model
{
    protected $table = "grados_titulos";

    protected $casts = [
        "estado" => "boolean",
    ];

    public function DenominacionGradoTitulo()
    {
        return $this->hasMany(denominacionGradoTitulo::class);
    }
}

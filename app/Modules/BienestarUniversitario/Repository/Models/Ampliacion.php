<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Ampliacion extends Model
{
    protected $table = "ampliaciones";
    protected $dates = ["fechaRegistro"];
    protected $fillable = ['mujer', 'total', 'varon', 'fechaRegistro', "servicio_id", "codigoMatricula"];

    protected $casts = [
        "estado" => "boolean"
    ];
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}

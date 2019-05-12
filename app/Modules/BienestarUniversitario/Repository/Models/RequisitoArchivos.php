<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;

class RequisitoArchivos extends Model
{
    //
    protected $table = "requisito_archivos";
    protected $fillable = [ "nombreOriginalArchivo", "nombreSistemaArchivo", "requisito_id", "url", "extension", "estado"];
    protected $casts = [
        "estado" => "boolean"
    ];
    public function requisito()
    {
        return $this->belongsTo(Requisito::class);
    }
}

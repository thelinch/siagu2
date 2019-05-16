<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class TiposDocumento extends Model
{
  //
  protected $table = "tipos_documentos";
    protected $casts = [
        "estado" => "boolean",
    ];

  public function persona()
  {
    return $this->hasMany(Persona::class);
  }
  
}

<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class FacultadOficina extends Model
{
  //

  public function escuelaprofesional()
  {
    return $this->hasMany(EscuelaProfesionale::class);
  }
  
}

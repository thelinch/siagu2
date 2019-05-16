<?php

namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
  //

  public function trabajadorArea()
  {
    return $this->hasMany(trabajadorArea::class);
  }
  
}

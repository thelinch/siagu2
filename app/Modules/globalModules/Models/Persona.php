<?php

namespace App\Modules\globalModules\Models;


use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  //
  protected $appends = ["nombre_completo"];
  public function alumnos()
  {
    return $this->hasMany(Alumno::class);
  }
  public function documento()
  {
    return $this->belongsTo(TipoDocumento::class);
  }
  public function getNombreCompletoAttribute()
  {
    return $this->nombre . " " . $this->apellido_paterno . " " . $this->apellido_materno;
  }
}

<?php


namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  //
  protected $appends = ["nombre_completo"];
  protected $table = "personas";
    protected $casts = [
        "estado" => "boolean",
    ];
  public function alumnos()
  {
    return $this->hasMany(Alumno::class);
  }
  public function documento()
  {
    return $this->belongsTo(TiposDocumento::class);
  }
  public function getNombreCompletoAttribute()
  {
    return $this->nombre . " " . $this->apellido_paterno . " " . $this->apellido_materno;
  }

  public function Docente()
  {
    return $this->hasMany(Docente::class);
  }
  
  public function tipo_documento()
  {
    return $this->belongsTo(TiposDocumento::class);
  }

  public function trabajadorAreas()
  {
    return $this->hasMany(trabajadorArea::class);
  }

}

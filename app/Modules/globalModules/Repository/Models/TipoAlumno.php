<?php


namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAlumno extends Model
{
    protected $table = "tipo_alumnos";
    protected $fillable = ['nombre', "estado"];
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}

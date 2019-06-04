<?php


namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;

class tipoAlumno extends Model
{
    protected $table = "tipos_alumnos";
    protected $fillable = ['nombre', "estado"];
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}

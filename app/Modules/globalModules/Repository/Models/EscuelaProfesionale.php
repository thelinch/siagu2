<?php


namespace App\Modules\globalModules\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\GradosyTitulos\Repository\Models\denominacionGradoTitulo;

class EscuelaProfesionale extends Model
{
    //
    protected $table = "escuela_profesionales";
    protected $casts = [
        "estado" => "boolean",
    ];
    public function alumnos()
    {
        return $this->hasMany(Alumno::Class);
    }
    public function facultad_oficina()
    {
        return $this->belongsTo(FacultadOficina::class);
    }

    public function denominacionGrado()
    {
        return $this->hasMany(denominacionGradoTitulo::class);
    }
}

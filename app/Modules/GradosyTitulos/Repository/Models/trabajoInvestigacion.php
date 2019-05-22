<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

//use  App\Modules\globalModules\Models\Persona;
use Illuminate\Database\Eloquent\Model;
//use App\Modules\GradosyTitulos\Controllers\restControllers\alumnoGraduadoTitulado;

class trabajoInvestigacion extends Model
{
    protected $table = "trabajos_investigaciones";
    protected $fillable = ["nombre", "url"];
    public function alumnosGraduados()
    {
        return  $this->hasMany(alumnoGraduadoTitulado::class);
    }

    public function AlumnoGraduadoTitulado()
    {
        return $this->hasMany(alumnoGraduadoTitulado::class);
    }

    public function DenominacionGradoTitulo()
    {
        return $this->hasMany(denominacionGradoTitulo::class);
    }

}

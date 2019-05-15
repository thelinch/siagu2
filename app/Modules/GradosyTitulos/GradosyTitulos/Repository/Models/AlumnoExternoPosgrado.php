<?php

namespace App\Modules\GradosyTitulos\Repository\Models;
use  App\Modules\globalModules\Models\Persona;
use Illuminate\Database\Eloquent\Model;

class AlumnoExternoPosgrado extends Model
{
    //
    protected $table="alumnos_externos_posgrados";
    
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}

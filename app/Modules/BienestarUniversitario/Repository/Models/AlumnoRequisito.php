<?php

namespace App\Modules\BienestarUniversitario\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\globalModules\Models\Alumno;

class AlumnoRequisito extends Model
{
    //
    protected $table = "alumno_requisitos";
    protected $fillable = ["codigoMatricula", "fechaRegistro"];
    public function archivos()
    {
        return $this->hasMany(ArchivoAlumnoRequisito::class);
    }
    public function requisito()
    {
        return $this->belongsTo(Requisito::Class, "requisito_id");
    }
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, "alumno_id");
    }
}

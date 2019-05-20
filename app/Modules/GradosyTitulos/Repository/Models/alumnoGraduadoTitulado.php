<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use  App\Modules\globalModules\Models\Persona;
use Illuminate\Database\Eloquent\Model;
use App\Modules\GradosyTitulos\Controllers\restControllers\registroAlumnoGraduadoTitulado;

class alumnoGraduadoTitulado extends Model
{
    protected $table = "alumnos_graduados_titulados";
    protected $fillable = ["alumno_general_id", "procedencia_bachiller", "procednencia_titulo_pedagogico", "fecha_ingreso", "fecha_egreso", "creditos_aprobados", "foto", "empresa_id", "tipo_alumno_id", "trabajo_investigacion_id", "denominacion_grado_titulo_id", "nombre_programa_estudio_id", "modalidad_estudio_id", "revalidacion_grado_id", "segunda_especialidad_id", "obtencion_grado_titulo_id", "grado_extranjero_id", "registro_programa_id"];
    protected $date = ["fecha_ingreso", "fecha_egreso"];
    protected $casts = [
        "fecha_ingreso" => "date:Y-m-d",
        "fecha_egreso" => "date:Y-m-d",
        "estado" => "boolean"
    ];
    public function trabajoInvestigacion()
    {
        return $this->belongsTo(trabajoInvestigacion::class);
    }
    
   
}

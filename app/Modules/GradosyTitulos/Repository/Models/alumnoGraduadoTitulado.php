<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function RegistroAlumnoGraduadoTitulado()
    {
        return  $this->hasMany(registroAlumnoGraduadoTitulado::class);
    }

    public function Empresa()
    {
        return  $this->belongsTo(empresa::class);
    }

    public function DenominacionGradoTitulo()
    {
        return  $this->belongsTo(denominacionGradoTitulo::class);
    }

    public function NombreProgramaEstudio()
    {
        return  $this->belongsTo(nombreProgramaestudio::class);
    }

    public function ModalidadEstudio()
    {
        return  $this->belongsTo(modalidad_estudio::class);
    }

    public function ObtencionGradoTitulo()
    {
        return  $this->belongsTo(obtenciongrado::class);
    }
}

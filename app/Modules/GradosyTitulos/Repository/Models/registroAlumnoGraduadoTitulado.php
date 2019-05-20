<?php

namespace App\Modules\GradosyTitulos\Repository\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\globalModules\Repository\Models\Rector;
use App\Modules\globalModules\Repository\Models\trabajadorArea;

class registroAlumnoGraduadoTitulado extends Model
{
    protected $table = "registros_graduados_titulados";

    protected $fillable = ["numero_oficio", "numero_resolucion", "fecha_resolucion", "numero_diploma", "fecha_emision_diploma", "registro_libro", "registro_folio", "numero_registro", "director_decano_id", "estado", "alumno_graduado_id", "tipo_diploma_id", "rector_id", "tipo_autoridad_id", "trabajador_areas_id"];
    protected $date = ["fecha_resolucion", "fecha_emision_diploma"];
    protected $casts = [
        "fecha_resolucion" => "date:Y-m-d",
        "fecha_emision_diploma" => "date:Y-m-d",
        "estado" => "boolean"
    ];

    public function AlumnoGraduadoTitulado()
    {
        return $this->belongsTo(alumnoGraduadoTitulado::class);
    }

    public function Rector()
    {
        return $this->belongsTo(Rector::class);
    }

    public function TrabajadorAreas()
    {
        return $this->belongsTo(trabajadorArea::class);
    }

    public function TipoDiploma()
    {
        return $this->belongsTo(tipo_diploma::class);
    }

}

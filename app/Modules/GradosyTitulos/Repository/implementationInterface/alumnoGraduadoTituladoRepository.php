<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\Models\AlumnoExternoPosgrado;
use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\Models\alumnoGraduadoTitulado;
use App\Modules\GradosyTitulos\Repository\Models\trabajoInvestigacion;

class alumnoGraduadoTituladoRepository implements alumnoGraduadoTituladoRepositoryInterface
{
    private $model;
    public function __construct(alumnoGraduadoTitulado $alumnoGraduadoTitulado)
    {
        $this->model = $alumnoGraduadoTitulado;
    }
    public function all()
    { }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        $cuerpoPeticion = $data->json()->all();
        $trabajoInvestigacionCreado = trabajoInvestigacion::create([
            "nombre" => $cuerpoPeticion["trabajo_investigacion"]["nombre"],
            "url" => $cuerpoPeticion["trabajo_investigacion"]["url"]
        ]);

        $alumnoGraduadoTituladoCreado = $this->model::create([
            "alumno_general_id" => $cuerpoPeticion["alumno_general_id"],
            "procedencia_bachiller" => $cuerpoPeticion["codigo_universidad"]["nombre"],
            "procednecia_titulo_pedagogico" => "NINGUNO",
            "fecha_ingreso" => $cuerpoPeticion["fecha_ingreso"],
            "fecha_egreso" => $cuerpoPeticion["fecha_egreso"],
            "creditos_aprobados" => $cuerpoPeticion["creditos_aprobados"],
            "foto" => "dwdwd",
            "tipo_alumno_id" => 1,
            "empresa_id" => $cuerpoPeticion["codigo_universidad"]["id"],
            "trabajo_investigacion_id" => $trabajoInvestigacionCreado->id,
            "denominacion_grado_titulo_id" => $cuerpoPeticion["denominacion_grado_titulo"]["id"],
            "nombre_programa_estudio_id" => $cuerpoPeticion["nombre_programa_estudio"]["id"],
            "modalidad_estudio_id" => $cuerpoPeticion["modalidad_de_estudio"]["id"],
            "revalidacion_grado_id" => 1,
            "segunda_especialidad_id" => 1,
            "obtencion_grado_titulo_id" => $cuerpoPeticion["obtencion_grado"]["id"],
            "grado_extranjero_id" => 1,
            "registro_programa_id" => 1
        ]);
        return $this->find($alumnoGraduadoTituladoCreado->id)->first();
    }
    public function edit($id, array $data)
    { }
}

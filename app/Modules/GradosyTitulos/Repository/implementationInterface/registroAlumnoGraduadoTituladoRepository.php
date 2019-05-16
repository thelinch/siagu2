<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\interfaces\registroAlumnoGraduadoTituladoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\Models\registroAlumnoGraduadoTitulado;
use Carbon\Carbon;

class registroAlumnoGraduadoTituladoRepository implements registroAlumnoGraduadoTituladoRepositoryInterface
{
    private $model;
    public function __construct(registroAlumnoGraduadoTitulado $registroAlumnoGraduadoTitulado)
    {
        $this->model = $registroAlumnoGraduadoTitulado;
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

        $registroAlumnoGraduadoTituladoCreado = $this->model::create([
            "numero_oficio" => $cuerpoPeticion["numero_oficio"],
            "numero_resolucion" => $cuerpoPeticion["numero_resolucion"],
            "fecha_resolucion" => Carbon::parse($cuerpoPeticion["fecha_resolucion"])->format("Y-m-d"),
            "numero_diploma" => $cuerpoPeticion["numero_diploma"],
            "fecha_emision_diploma" =>  Carbon::parse($cuerpoPeticion["fecha_emision_diploma"])->format("Y-m-d"),
            "registro_libro" => $cuerpoPeticion["registro_libro"],
            "registro_folio" => $cuerpoPeticion["registro_folio"],
            "numero_registro" => $cuerpoPeticion["numero_registro"],
            "director_decano_id" => $cuerpoPeticion["director_decano"]["id"],
            "alumno_graduado_id" => $cuerpoPeticion["alumno_graduado_id"],
            "tipo_diploma_id" => 1,
            "rector_id" => $cuerpoPeticion["rector"]["id"],
            "tipo_autoridad_id" => 1,
            "trabajador_areas_id" => $cuerpoPeticion["trabajador_areas"]["id"],
        ]);

        return $this->model->where("id", "=", $registroAlumnoGraduadoTituladoCreado->id)->first();
    }

    public function edit($id, array $data){

    }
    /*
    public function edit($id, array $data)
    {
        $alumnoGraduadoTitulado = $this->find($id);
        $trabajoInvestigacion = trabajoInvestigacion::updated($data["trabajo_investigacion"]);
        //  $trabajoInvestigacion->nombre = $data["trabajo_investigacion"]["nombre"];
        //$alumnoGraduadoTitulado->
        $alumnoGraduadoTitulado->procedencia_bachiller = $data["codigo_universidad"]["nombre"];
        $alumnoGraduadoTitulado->fecha_ingreso =  Carbon::parse($data["fecha_ingreso"])->format("Y-m-d");
        $alumnoGraduadoTitulado->fecha_egreso = Carbon::parse($data["fecha_egreso"])->format("Y-m-d");
        $alumnoGraduadoTitulado->creditos_aprobados = $data["creditos_aprobados"];
        $alumnoGraduadoTitulado->empresa_id = $data["codigo_universidad"]["id"];
        $alumnoGraduadoTitulado->nombre_programa_estudio_id = $data["nombre_programa_estudio"]["id"];
        $alumnoGraduadoTitulado->modalidad_estudio_id = $data["modalidad_de_estudio"]["id"];
        $alumnoGraduadoTitulado->obtencion_grado_titulo_id = $data["obtencion_grado"]["id"];

        $alumnoGraduadoTitulado->save();
        return $this->model->where("id", "=", $alumnoGraduadoTitulado->id)->with("trabajoInvestigacion")->first();
    }
    */
}

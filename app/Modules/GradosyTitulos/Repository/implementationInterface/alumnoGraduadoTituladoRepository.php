<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\Models\alumnoGraduadoTitulado;
use App\Modules\GradosyTitulos\Repository\Models\trabajoInvestigacion;
use Carbon\Carbon;

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
        return $this->model->with(["Empresa","trabajoInvestigacion","DenominacionGradoTitulo.gradosTitulo","NombreProgramaEstudio","ModalidadEstudio","ObtencionGradoTitulo"])->find($id);
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
            "procedencia_bachiller" => $cuerpoPeticion["empresa_id"]["nombre"],
            "procednecia_titulo_pedagogico" => "NINGUNO",
            "fecha_ingreso" => Carbon::parse($cuerpoPeticion["fecha_ingreso"])->format("Y-m-d"),
            "fecha_egreso" =>  Carbon::parse($cuerpoPeticion["fecha_egreso"])->format("Y-m-d"),
            "creditos_aprobados" => $cuerpoPeticion["creditos_aprobados"],
            "foto" => "dwdwd",
            "tipo_alumno_id" => 1,
            "empresa_id" => $cuerpoPeticion["empresa_id"]["id"],
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
        return $this->model->where("id", "=", $alumnoGraduadoTituladoCreado->id)->with("trabajoInvestigacion")->first();
    }

    public function edit($id, array $data)
    {
        $alumnoGraduadoTitulado = $this->find($id);
        $trabajoInvestigacion = trabajoInvestigacion::find($data["trabajo_investigacion"]["id"]);
        $trabajoInvestigacion->nombre = $data["trabajo_investigacion"]["nombre"];
        $trabajoInvestigacion->url = $data["trabajo_investigacion"]["url"];
        $trabajoInvestigacion->save();
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
}

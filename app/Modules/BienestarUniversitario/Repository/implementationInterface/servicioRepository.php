<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\ServicioRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Modules\BienestarUniversitario\Repository\Models\cicloAcademicoServicios;

class servicioRepository implements ServicioRepositoryInterface
{
    private $model;
    private $cicloAcademicoModel;
    public function __construct(Servicio $servicio, cicloAcademicoServicios $cicloAcademicoServicioModel)
    {
        $this->model = $servicio;
        $this->cicloAcademicoModel = $cicloAcademicoServicioModel;
    }
    public function all()
    {
        return $this->model::with(["cicloAcademicoActual.cicloAcademico"])->where("estado", 1)->get();
    }
    public function find($id)
    {

        return $this->model::where("id", "=", $id)->first();
    }
    public function delete($id)
    {
        $modelDelete = $this->find($id);
        $modelDelete->estado = 0;
        foreach ($modelDelete->requisitos()->get() as $requisito) {
            $modelDelete->requisitos()->updateExistingPivot($requisito->id, ['estado' => false]);
        }
        $modelDelete->save();
        return  $modelDelete;
    }
    public function create(Request $data)
    {
        $modelObjeto = $data->json()->all();

        $modelCreate = $this->model::create(
            [
                "nombre" => $modelObjeto["nombre"],
                "icono" => $modelObjeto["icono"] != null ? $modelObjeto["icono"] : "fa-eye-slash",
                "codigoMatricula" => $modelObjeto["matricula"]["nombre"]
            ]
        );
        $this->cicloAcademicoModel->create([
            "servicio_id" => $modelCreate->id,
            "ciclo_academico_id" => $modelObjeto["matricula"]["id"],
            "vigencia" => true
        ]);

        return Servicio::with(["cicloAcademicoActual.cicloAcademico"])->where("id", $modelCreate->id)->get()->first();
    }
    public function edit($id, array $data)
    {
        $modelServicio = $this->find($id);
        $modelServicio->nombre = $data["nombre"];
        $modelServicio->icono = $data["icono"] != null ? $data["icono"] : "fa-eye-slash";
        $modelServicio->save();
        return $modelServicio;
    }

    public function activarServicio(Request $request)
    {
        $jsonServicio = $request->json()->all();
        $modelServicio = $this->find($jsonServicio["id"]);
        $modelServicio->fechaInicio = Carbon::parse($jsonServicio["fechaInicio"])->format("Y-m-d");
        $modelServicio->fechaFin =  Carbon::parse($jsonServicio["fechaFin"])->format("Y-m-d");
        $modelServicio->activador = true;
        $modelServicio->save();
        return $modelServicio;
    }
    public function requisitosPorIdServicio(Request $request)
    {
        $jsonModel = $request->json()->all();
        $modelServicio = $this->find($jsonModel["id"]);
        return $modelServicio->requisitos()->get();
    }
    public function todososAlumnosPorIdServicio(Request $request)
    {
        $jsonModel = $request->json()->all();
        $modelServicio = $this->find($jsonModel["id"]);
        return "esta por arreglar";
    }
    public function serviciosActivados()
    {
        return $this->model->where("activador", "=", true)->where("estado", "=", true)->get();
    }
    public function listarRequisitosPorListaDeServicio(array $listaServicios)
    {
        $requisitosPorListaDeServicios = Servicio::with(["requisitos.archivos", "requisitos.tipos"])
            ->whereIn("id", $listaServicios)->get()->map(function ($servicio) {
                return  $servicio->requisitos;
            })->flatten()->unique("id");


        return $requisitosPorListaDeServicios;
    }

    public function listaServiciosPorAlumno(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
    }
    public  function servicioConAmpliaciones(int $id)
    {
        return $this->model->where("id", "=", $id)->with("ampliaciones")->first();
    }
    public function edicioTotalNumeroVaronesMujeresPorServicio(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $modelEdit = $this->model->find($cuerpoPeticion["servicio_id"]);
        $modelEdit->total = $modelEdit->total + $cuerpoPeticion["total"];
        $modelEdit->vacantesHombre = $modelEdit->vacantesHombre + $cuerpoPeticion["varon"];
        $modelEdit->vacantesMujer = $modelEdit->vacantesMujer + $cuerpoPeticion["mujer"];
        $modelEdit->save();
        return $modelEdit;
    }
    public function listarRequisitosActualizadosPorListaDeServicio(array $listaServiciosSolicitados)
    { }
    public function reiniciarServicioYActualizarCicloAcademico(int $id, string $codigoMatriculaSeleccionado, int $idCicloAcademico)
    {
        $modelEdit = Servicio::find($id);
        if ($modelEdit->has("cicloAcademicoActual")) {
            $modelEdit->cicloAcademicoActual()->update(["vigencia" => false]);
        }
        $modelEdit->ampliaciones()->update(["estado" => 0]);
        $this->cicloAcademicoModel->create([
            "servicio_id" => $id,
            "ciclo_academico_id" => $idCicloAcademico
        ]);
        $modelEdit->total = 0;
        $modelEdit->vacantesHombre = 0;
        $modelEdit->vacantesMujer = 0;
        $modelEdit->codigoMatricula = $codigoMatriculaSeleccionado;
        $modelEdit->save();
        return Servicio::with(["cicloAcademicoActual.cicloAcademico"])->where("id", $modelEdit->id)->get()->first();
    }
}

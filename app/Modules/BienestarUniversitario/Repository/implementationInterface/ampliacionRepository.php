<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\ampliacionRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\Ampliacion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;

class ampliacionRepository implements ampliacionRepositoryInterface
{
    private $model;
    private $servicioModel;
    public function __construct(Ampliacion $ampliacion, Servicio $servicioModel)
    {
        $this->model = $ampliacion;
        $this->servicioModel = $servicioModel;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        $cuerpoPeticion = $data->json()->all();
        $this->model->create([
            "varon" => $cuerpoPeticion["varon"] == null ? 0 : $cuerpoPeticion["varon"],
            "mujer" => $cuerpoPeticion["mujer"] == null ? 0 : $cuerpoPeticion["mujer"],
            "total" => $cuerpoPeticion["total"],
            "servicio_id" => $cuerpoPeticion["servicio_id"],
            "fechaRegistro" => Carbon::now(),
            "codigoMatricula" => $cuerpoPeticion["codigoMatricula"]
        ]);
        // return $modelCreate;
    }
    public function edit($id, array $data)
    { }
    public function  listarAmpliacionPorServicioId(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->servicioModel->find($cuerpoPeticion["id"])->ampliaciones()->where("estado", 1)->get();
        // return $this->model->where("estado", 1)->where("codigoMatricula", "=", $cuerpoPeticion["codigoMatricula"])->where("servicio_id", $cuerpoPeticion["id"])->get();
    }
}

<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\ampliacionRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\Ampliacion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ampliacionRepository implements ampliacionRepositoryInterface
{
    private $model;
    public function __construct(Ampliacion $ampliacion)
    {
        $this->model = $ampliacion;
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
            "varon" => $cuerpoPeticion["varon"],
            "mujer" => $cuerpoPeticion["mujer"],
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
        return $this->model->where("estado", 1)->where("codigoMatricula", "=", $cuerpoPeticion["codigoMatricula"])->where("servicio_id", $cuerpoPeticion["id"])->get();
    }
}

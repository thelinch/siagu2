<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\RequisitoRepositoryInterface;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\BienestarUniversitario\Repository\Models\Tipo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RequisitoRepository implements RequisitoRepositoryInterface
{
    private $model;
    public function __construct(Requisito $requisito)
    {
        $this->model = $requisito;
    }
    public function all()
    {
        return $this->model::where("estado", 1)->with("tipos")->with("servicios")->orderBy("created_at")->get();
    }
    public function find($id)
    {
        return $this->model::where("id", "=", $id);
    }
    public function delete($id)
    {
        $modelRequisito = $this->find($id)->first();
        foreach ($modelRequisito->tipos()->get() as $tipo) {
            $modelRequisito->tipos()->updateExistingPivot($tipo->id, ['estado' => false]);
        }
        foreach ($modelRequisito->servicios()->get() as $servicio) {
            $modelRequisito->servicios()->updateExistingPivot($servicio->id, ['estado' => false]);
        }
        $modelRequisito->estado = 0;
        $modelRequisito->save();
        return $modelRequisito->id;
    }
    public function create(Request $data)
    {
        $objetoRequest = $data->json()->all();

        $modelorequisito = $this->model::create(
            [
                "nombre" => $objetoRequest["nombre"],
                "descripcion" => $objetoRequest["descripcion"],
                "requerido" => $objetoRequest["requerido"] == "true" ? true : false,
                "prioridad" => $objetoRequest["prioridad"] == "true" ? true : false,
                "tipoArchivo" => $objetoRequest["tipoArchivo"],
                "nombreArchivo" => $objetoRequest["nombreArchivo"]
            ]
        );
        foreach ($data["tipos"] as $tipo) {
            $modelorequisito->tipos()->attach($tipo);
        }
        foreach ($data["servicios"] as $servicio) {
            $modelorequisito->servicios()->attach($servicio);
        }
        return $this->find($modelorequisito->id)->with("tipos")->with("servicios")->first();
    }


    public function edit($id, array $data)
    {
        $modelRequisito = $this->find($id)->first();
        $modelRequisito->nombre = $data["nombre"];
        $modelRequisito->descripcion = $data["descripcion"];
        $modelRequisito->prioridad = $data["prioridad"];
        $modelRequisito->requerido = $data["requerido"];
        $modelRequisito->tipoArchivo = $data["tipoArchivo"];
        $modelRequisito->nombreArchivo = $data["nombreArchivo"];
        $modelRequisito->save();
        return $this->find($modelRequisito->id)->with("servicios")->with("tipos")->first();
    }

    public function updateTipo(Request $request)
    {
        $objetoJson = $request->json()->all();
        $requisito = $this->find($objetoJson["id"])->first();
        if ($objetoJson["estado"]) {
            $requisito->tipos()->attach($objetoJson["idTipo"]);
        } else {
            $requisito->tipos()->updateExistingPivot($objetoJson["idTipo"], ['estado' => $objetoJson["estado"]]);
        }
        return $this->find($requisito->id)->with("tipos")->with("servicios")->first();
    }
    public function updateServicio(Request $request)
    {
        $objetoJson = $request->json()->all();
        $requisito = $this->find($objetoJson["id"])->first();
        if ($objetoJson["estado"]) {
            $requisito->servicios()->attach($objetoJson["idServicio"]);
        } else {

            $requisito->servicios()->updateExistingPivot($objetoJson["idServicio"], ['estado' => $objetoJson["estado"]]);
        }
        return $this->find($requisito->id)->with("tipos")->with("servicios")->first();
    }

    public function getArchivosPorRequisitoId(Request $request)
    {
        $objetJson = $request->json()->all();
        return  $this->model->find($objetJson["id"])->archivos()->where("estado", 1)->get();
    }
    public function cambiarActualizacion(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $modelEdit = Requisito::find($cuerpoPeticion["idRequisito"]);
        $modelEdit->actualizacion = $cuerpoPeticion["checked"];
        $modelEdit->save();
        return $modelEdit;
    }
    public function listarArchivosPorServicio(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $requisito = Requisito::find($cuerpoPeticion["id"]);
        return $requisito->archivos();
    }
}

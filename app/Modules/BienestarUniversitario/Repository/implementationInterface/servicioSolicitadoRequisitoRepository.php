<?php

namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRequisitoInterface;
use App\Modules\BienestarUniversitario\Repository\Models\ObuServicioRequisito;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class servicioSolicitadoRequisitoRepository implements servicioSolicitadoRequisitoInterface
{
    private $model;
    public function __construct(ObuServicioRequisito $obuServicioRequisito)
    {
        $this->model = $obuServicioRequisito;
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
        $servicioSolicitadoRequisitoCreado = $this->model->create([
            "codigoMatricula" => $cuerpoPeticion["codigoMatricula"],
            "obu_solicitud_id" => $cuerpoPeticion["idServicioSolicitado"],
            "fechaRegistro" => Carbon::now(),
            "requisito_id" => $cuerpoPeticion["idRequisito"]
        ]);
        return $servicioSolicitadoRequisitoCreado;
    }
    public function edit($id, array $data)
    { }
    public function crearArchivoAlumnoRequisito(string $nombreOrigalArchivo, string $nombreSistema, string $url, string $extension, int $servicioRequisitoId)
    {
        $this->model->find($servicioRequisitoId)->archivos()->create([
            "nombreOriginal" => $nombreOrigalArchivo,
            "nombreSistema" => $nombreSistema,
            "url" => $url,
            "extension" => $extension
        ]);
    }
}

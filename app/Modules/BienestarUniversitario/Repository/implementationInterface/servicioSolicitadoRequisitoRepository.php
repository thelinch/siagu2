<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRequisitoInterface;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitadoRequisito;
use Illuminate\Support\Carbon;

class servicioSolicitadoRequisitoRepository implements servicioSolicitadoRequisitoInterface
{
    private $model;
    public function __construct(ServicioSolicitadoRequisito $servicioSolicitadoRequisito)
    {
        $this->model = $servicioSolicitadoRequisito;
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
            "servicio_solicitado_id" => $cuerpoPeticion["idServicioSolicitado"],
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

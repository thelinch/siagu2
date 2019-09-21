<?php

namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\obuSolicitudRequisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\ArchivoAlumnoRequisito;
use Illuminate\Http\Request;

class obuSolicitudRequisitoArchivoRepository implements obuSolicitudRequisitoArchivoRepositoryInterface
{
    private $model;
    public function __construct(ArchivoAlumnoRequisito $model)
    {
        $this->model = $model;
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
        $modelCreate = $this->model->create([
            "nombreOriginal" => "dwd",
            "nombreSistema" => "dwdwdwdwd",
            "obuServicio_requisito_id" => $cuerpoPeticion["obu_requisito_id"],
            "url" => $cuerpoPeticion["url"],
            "extension" => "FEdwd"
        ]);
        return $modelCreate;
    }
    public function edit($id, array $data)
    { }
}

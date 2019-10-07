<?php

namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\requisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\RequisitoArchivos;
use Illuminate\Http\Request;

class requisitoArchivoRepository implements requisitoArchivoRepositoryInterface
{
    private $model;
    public function __construct(RequisitoArchivos $model)
    {
        $this->model = $model;
    }

    public function create(Request $request)
    {
        $modelCreate = $this->model->create($request->json()->all());
        return $modelCreate;
    }
    public function eliminar(int $id)
    {
        $archivoSeleccionado = $this->model->find($id);
        $archivoSeleccionado->estado = false;
        $archivoSeleccionado->save();
        return $archivoSeleccionado;
    }
}

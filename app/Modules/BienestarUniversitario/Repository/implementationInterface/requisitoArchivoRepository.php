<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\requisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\RequisitoArchivos;

class requisitoArchivoRepository implements requisitoArchivoRepositoryInterface
{
    private $model;
    public function __construct(RequisitoArchivos $model)
    {
        $this->model = $model;
    }

    public function create(String $nombreOriginalArchivo, String $nombreSistemaArchivo, int $requisito_id, String $url, String $extension)
    {
        $modelCreate = $this->model->create([
            "nombreOriginalArchivo" => $nombreOriginalArchivo,
            "nombreSistemaArchivo" => $nombreSistemaArchivo,
            "requisito_id" => $requisito_id,
            "url" => $url,
            "extension" => $extension
        ]);
    }
    public function eliminar(int $id)
    {
        $archivoSeleccionado = $this->model->find($id);
        $archivoSeleccionado->estado = false;
        $archivoSeleccionado->save();
        return $archivoSeleccionado;
    }
}

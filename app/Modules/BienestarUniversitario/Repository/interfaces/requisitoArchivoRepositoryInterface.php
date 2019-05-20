<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;

interface requisitoArchivoRepositoryInterface
{
    public function create(String $nombreOriginalArchivo, String $nombreSistemaArchivo, int $requisito_id, String $url, String $extencion);
    public function eliminar(int $id);
}

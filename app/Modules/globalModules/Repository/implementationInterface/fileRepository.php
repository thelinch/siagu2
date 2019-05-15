<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\fileRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\RequisitoArchivos;
use Illuminate\Http\Request;

class fileRepository implements fileRepositoryInterface
{
    private $model;
    public function __construct(RequisitoArchivos $requisitoArchivo)
    {
        $this->model = $requisitoArchivo;
    }

    function fileUploadRequisito($requisitoId, $nombreOriginalArchivo, $nombreSistemaArchivo, $url)
    {
        $this->model->create([
            "nombreOriginalArchivo" => $nombreOriginalArchivo,
            "nombreSistemaArchivo"=>$nombreSistemaArchivo,
            "requisito_id"=>$requisitoId,
            "url"=>$url
        ]);
        
    }
}

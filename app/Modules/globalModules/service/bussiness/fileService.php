<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\fileServiceInterface;
use App\Modules\globalModules\Repository\interfaces\fileRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\RequisitoArchivos;
use Illuminate\Http\Request;

class fileService implements fileServiceInterface
{
    private $repository;
    public function __construct()
    { }
    public  function fileUploadRequisito(Request $request)
    {
        $nombreCarpeta = $request->nombreCarpeta;

        if (!\Storage::disk("local")->has($nombreCarpeta)) {
            \Storage::makeDirectory($nombreCarpeta, 0775, true);
        }
        $file = $request->file("archivo");
        $originalNombre = $file->getClientOriginalName();
        $idRequisito = $request->idRequisito;
        $sistemaNombre = $idRequisito . $originalNombre;
        \Storage::disk("local")->put($nombreCarpeta . '/' . $sistemaNombre, \File::get($file));
        $url = $nombreCarpeta . '/' . $sistemaNombre;
        $extension = $file->getClientOriginalExtension();
        RequisitoArchivos::create([
            "id_objeto" => 1,
            "nombreOriginalArchivo" => $originalNombre,
            "nombreSistemaArchivo" => $sistemaNombre,
            "requisito_id" => $idRequisito,
            "url" => $url,
            "extension" => $extension
        ]);
    }
}

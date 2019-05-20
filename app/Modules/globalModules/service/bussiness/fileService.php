<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\fileServiceInterface;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\Repository\interfaces\requisitoArchivoRepositoryInterface;

class fileService implements fileServiceInterface
{
    private $repository;
    private $archivoRequisitoRepository;
    public function __construct(requisitoArchivoRepositoryInterface $archivoRequisitoRepository)
    {
        $this->archivoRequisitoRepository = $archivoRequisitoRepository;
    }
    public  function fileUploadRequisito(Request $request)
    {
        $nombreCarpeta = $request->nombreCarpeta;

        if (!\Storage::disk("public")->has($nombreCarpeta)) {
            \Storage::makeDirectory($nombreCarpeta, 0775, true);
        }
        $file = $request->file("archivo");
        $originalNombre = $file->getClientOriginalName();
        $idRequisito = $request->idRequisito;
        $sistemaNombre = $idRequisito . $originalNombre;
        \Storage::disk("public")->put($nombreCarpeta . '/' . $sistemaNombre, \File::get($file));
        $url = \Storage::url($nombreCarpeta . $sistemaNombre);
        $extension = $file->getClientOriginalExtension();
        $this->archivoRequisitoRepository->create($originalNombre, $sistemaNombre, $idRequisito, $url, $extension);
    }
    public function elimnarArchivoRequisito(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->archivoRequisitoRepository->eliminar($cuerpoPeticion["idArchivo"]);
    }
}

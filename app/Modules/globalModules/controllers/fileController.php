<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\BienestarUniversitario\service\bussiness\alumnoService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Modules\globalModules\service\bussiness\fileService;

/**
 * IndexController
 *
 * Controller to house all the functionality directly
 * related to the ModuleOne.
 */
class FileController extends Controller
{
    private $service;
    public function __construct(fileService $fileService)
    {
        $this->service = $fileService;
    }
    public function create(Request $request)
    { }
    public function  fileUpload(Request $request)
    {
        $file = $request->file("archivo");
        $nombre = $file->getClientOriginalName();
        $nombreCarpeta = $request->nombreCarpeta;
        if (!\Storage::disk("local")->has($nombreCarpeta)) {
            \Storage::makeDirectory($nombreCarpeta, 0775, true);
        }
        //\Storage::disk('local')->put($nombre,  \File::get($file));
        \Storage::disk('local')->put($nombreCarpeta . "/" . $nombre, \File::get($file));

        return response()->json("archivo guardado", 200);
    }
    /** $request archivo que servira como modelo para los requisitos 
     * @Return Url:string 
     */
    public function fileUploadRequisito(Request $request)
    {


        $this->service->fileUploadRequisito($request);
    }
    public function crearCarpetaRaiz($nombreCarpeta)
    {
        $creacion = false;
        if (!\Storage::disk("local")->has($nombreCarpeta)) {
            \Storage::makeDirectory($nombreCarpeta, 0775, true);
            $creacion = true;
        }
        return $creacion;
    }
    public function elimarArchivoRequisito(Request $request)
    {
        return response()->json($this->service->elimnarArchivoRequisito($request));
    }
}

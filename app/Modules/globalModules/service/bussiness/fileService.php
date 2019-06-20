<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\fileServiceInterface;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\Repository\interfaces\requisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use Carbon\Carbon;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRequisitoInterface;

class fileService implements fileServiceInterface
{
    private $repository;
    private $archivoRequisitoRepository;
    private $servicioSolicitadoRepository;
    private $servicioSolicitadoRequisitoRepository;
    public function __construct(
        requisitoArchivoRepositoryInterface $archivoRequisitoRepository,
        servicioSolicitadoRepositoryInterface $servicioSolicitadoRepository,
        servicioSolicitadoRequisitoInterface $servicioSolicitadoRequisitoRepository
    ) {
        $this->archivoRequisitoRepository = $archivoRequisitoRepository;
        $this->servicioSolicitadoRepository = $servicioSolicitadoRepository;
        $this->servicioSolicitadoRequisitoRepository = $servicioSolicitadoRequisitoRepository;
    }


    public function fileUpload(Request $request)
    {
        $file = $request->file("archivo");
        $nombre = $file->getClientOriginalName();
        $nombreCarpeta = $request->nombreCarpeta;
        if (!\Storage::disk("public")->has($nombreCarpeta)) {
            \Storage::makeDirectory($nombreCarpeta, 0775, true);
        }
        $nombreSistema = $request->id;
        $extension = $file->extension();
        \Storage::disk('public')->put($nombreCarpeta . "/" . $nombreSistema . "." . $extension, \File::get($file));
        $url = \Storage::url($nombreCarpeta . "/" . $nombreSistema . "." . $extension);
        return $url;
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
    public function subirFotoServicioSolicitadoRequisitos(Request $request)
    {
        $idServicioSoliciado = $request->idServicioSolicitado;
        $idRequisito = $request->idRequisito;
        $servicioSolicitado = $this->servicioSolicitadoRepository->find($idServicioSoliciado);
        $servicioSolicitadoRequisito = $this->servicioSolicitadoRepository->crearServicioSolicitadoRequisitoPorServicioSolicitado($servicioSolicitado->id, $servicioSolicitado->codigoMatricula, $idRequisito);
        $nombreCarpeta = $request->nombreCarpeta;
        $servicioSolicitadoRequisitoCreado = $this->servicioSolicitadoRequisitoRepository->find($servicioSolicitadoRequisito->id);
        $archivos = $request->file("archivos");
        /*foreach ($request->file("archivos") as $archivo) {

            $originalNombre = $archivo->getClientOriginalName();
            $idRequisito = $request->idRequisito;
            $sistemaNombre = $idRequisito . $originalNombre;
            \Storage::disk("public")->put($nombreCarpeta . '/' . $sistemaNombre, \File::get($archivo));
            $url = \Storage::url($nombreCarpeta . $sistemaNombre);
            $extension = $archivo->getClientOriginalExtension();
            $this->servicioSolicitadoRequisitoRepository->crearArchivoAlumnoRequisito($originalNombre, $sistemaNombre, $url, $extension, $servicioSolicitadoRequisitoCreado->id);
        }*/
        return $archivos;
    }
}

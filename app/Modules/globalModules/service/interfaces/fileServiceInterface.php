<?php
namespace App\Modules\globalModules\service\interfaces;

use Illuminate\Http\Request;

interface fileServiceInterface
{
    public  function fileUploadRequisito(Request $request);
    public function elimnarArchivoRequisito(Request $request);
    public function fileUpload(Request $request);
    public function subirFotoServicioSolicitadoRequisitos(Request $request);
}

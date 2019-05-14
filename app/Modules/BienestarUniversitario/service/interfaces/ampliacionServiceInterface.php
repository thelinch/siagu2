<?php
namespace App\Modules\BienestarUniversitario\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface ampliacionServiceInterface extends crudService
{
    public function  listarAmpliacionPorServicioId(Request $request);
}

<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\globalModules\service\bussiness\cicloAcademicoService;

class cicloAcademicoController extends Controller
{

    private $service;
    public function __construct(cicloAcademicoService $service)
    {
        $this->service = $service;
    }
    public function all()
    {
        return response()->json($this->service->all());
    }
    public function modificarCicloAcademicoPorServicio(Request $request)
    {
        return response()->json($this->service->modificarCicloAcademicoPorServicio($request));
    }
}

<?php

namespace App\Modules\BienestarUniversitario\Controllers\restControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\bussiness\servicioSolicitadoService;

class servicioSolicitadoController extends Controller
{

    private $service;
    public function __construct(servicioSolicitadoService $servicioSolicitado)
    {
        $this->service = $servicioSolicitado;
    }

    public function listaServicioSolicitadoPorSemestreActual(Request $request)
    {
        return response()->json($this->service->listaServicioSolicitadoPorSemestreActual(($request)));
    }
    public function registroServicioSolicitadoPorAlumno(Request $request)
    {
        return response()->json($this->service->registroServicioSolicitadoPorAlumno(($request)));
    }
}

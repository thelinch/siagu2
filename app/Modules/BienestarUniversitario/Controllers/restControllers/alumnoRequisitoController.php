<?php

namespace  App\Modules\BienestarUniversitario\Controllers\restControllers;

use App\Http\Controllers\Controller;
use App\Modules\BienestarUniversitario\service\bussiness\alumnoRequisitoService;
use Illuminate\Http\Request;

class alumnoRequisitoController extends Controller
{
    private $service;
    public function __construct(alumnoRequisitoService $serviceAlumnoRequisito)
    {
        $this->service = $serviceAlumnoRequisito;
    }
    public function listaArchvivoPorAlumnoRequisito(Request $request)
    {
        return response()->json($this->service->listaArchivoPorAlumnoRequisito($request), 200);
    }
    public function listaAlumnoRequisitoPorAlumno(Request $request)
    {
        return response()->json($this->service->listaAlumnoRequisitoPorAlumnoYSemestre($request), 200);
    }
    public function historialDeEstadosPorArchivo(Request $request)
    {
        return response()->json($this->service->historialDeEstadosPorArchivo($request));
    }
}

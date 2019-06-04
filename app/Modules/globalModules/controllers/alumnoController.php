<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\alumnoService;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    private $service;
    public function __construct(alumnoService $alumnoService)
    {
        $this->service = $alumnoService;
    }

    public function alumnosPregrado()
    {
        return response()->json($this->service->listaAlumnosPregrado());
    }
    public function buscarAlumnoConRequisitosYServiciosPorId(Request $request)
    {
        return response()->json($this->service->buscarAlumnoConRequisitosYServiciosPorId($request));
    }
    public function listaServiciosPorAlumno(Request $request)
    {
        return $this->service->listaServiciosPorAlumno($request);
    }
    public function listarRequisitosPorAlumnoYSemestreActual(Request $request)
    {
        return $this->service->listarRequisitosPorAlumnoYSemestreActual($request);
    }
    public function alumnosFiltrado(Request $request)
    {
        return response()->json($this->service->listaAlumnosFiltrado($request));
    }
}

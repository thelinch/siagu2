<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\bussiness\alumnoGraduadoTituladoService;

class alumnoGraduadoTituladoController extends Controller
{
    private $service;
    public function __construct(alumnoGraduadoTituladoService $service)
    {
        $this->service = $service;
    }


    public function create(Request $request)
    {
        return response()->json($this->service->create($request));
    }
    public function edit($id, Request $request)
    {
        return response()->json($this->service->edit($id, $request->json()->all()));
    }

    public function alumnoGraduadoTitulado()
    {
        return response()->json($this->service->listaAlumnosBachilleres(), 200);
    }

}

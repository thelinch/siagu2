<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\GradosyTitulos\service\bussiness\denominacionGradoService;

class denominacionGradoController extends Controller
{

    private $service;

    public function __construct(denominacionGradoService $service)
    {
        $this->service = $service;
    }
    public function listaDenominacionPorEscuelaProfesional(Request $request)
    {
        return response()->json($this->service->listaDenominacionPorEscuelaProfesionalYAlumnoBachiller($request));
    }
}

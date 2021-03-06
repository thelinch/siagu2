<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\GradosyTitulos\service\bussiness\obtencionGradoService;

class obtencionGradoController extends Controller
{

    private $service;

    public function __construct(obtencionGradoService $service)
    {
        $this->service = $service;
    }
    public function listaObtencionGrado(Request $request)
    {
        return response()->json($this->service->listaObtencionGradoYAlumnoBachiller($request));
    }
}

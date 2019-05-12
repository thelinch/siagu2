<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\GradosyTitulos\service\bussiness\empresaService;

class empresaController extends Controller
{

    private $service;

    public function __construct(empresaService $service)
    {
        $this->service = $service;
    }
    public function listaEmpresa(Request $request)
    {
        return response()->json($this->service->listaEmpresaYAlumnoBachiller($request));
    }
}

<?php

namespace App\Modules\BienestarUniversitario\Controllers\restControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\bussiness\servicioSolicitadoRequisitoService;

class servicioSolicitadoRequisitoController extends Controller
{
    private $service;
    public function __construct(servicioSolicitadoRequisitoService $service)
    {
        $this->service = $service;
    }
    public function create(Request $request)
    {
        return response()->json($this->service->create($request));
    }
}

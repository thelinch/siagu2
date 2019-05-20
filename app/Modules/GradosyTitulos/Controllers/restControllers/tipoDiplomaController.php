<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\GradosyTitulos\service\bussiness\tipoDiplomaService;

class tipoDiplomaController extends Controller
{

    private $service;

    public function __construct(tipoDiplomaService $service)
    {
        $this->service = $service;
    }
    public function listaTipoDiploma(Request $request)
    {
        return response()->json($this->service->listaTipoDiploma($request));
    }
}

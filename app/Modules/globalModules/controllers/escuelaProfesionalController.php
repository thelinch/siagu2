<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\escuelaprofesionaleService;

class escuelaProfesionalController extends Controller
{
    private $service;
    public function __construct(escuelaprofesionaleService $escuelaprofesionaleService)
    {
        $this->service = $escuelaprofesionaleService;
    }

    public function escuelaProfesional()
    {
        return response()->json($this->service->listaEscuelasProfesionales());
    }
}

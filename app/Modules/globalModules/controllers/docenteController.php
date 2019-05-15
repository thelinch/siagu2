<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\docenteService;

class docenteController extends Controller
{
    private $service;
    public function __construct(docenteService $docenteService)
    {
        $this->service = $docenteService;
    }

    public function docente()
    {
        return response()->json($this->service->listaDocentes());
    }
}

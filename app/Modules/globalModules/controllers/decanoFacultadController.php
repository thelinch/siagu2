<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\decanoFacultadService;

class decanoFacultadController extends Controller
{
    private $service;
    public function __construct(decanoFacultadService $decanoFacultadService)
    {
        $this->service = $decanoFacultadService;
    }

    public function decanoFacultad()
    {
        return response()->json($this->service->listaDecanoFacultades());
    }
}

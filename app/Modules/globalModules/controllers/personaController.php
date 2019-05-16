<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\personaService;

class personaController extends Controller
{
    private $service;
    public function __construct(personaService $personaService)
    {
        $this->service = $personaService;
    }

    public function persona()
    {
        return response()->json($this->service->listaPersonas());
    }
}

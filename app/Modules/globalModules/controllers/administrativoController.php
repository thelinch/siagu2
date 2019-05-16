<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\administrativoService;

class administrativoController extends Controller
{
    private $service;
    public function __construct(administrativoService $administrativoService)
    {
        $this->service = $administrativoService;
    }

    public function administrativo()
    {
        return response()->json($this->service->listaAdministrativos());
    }
}

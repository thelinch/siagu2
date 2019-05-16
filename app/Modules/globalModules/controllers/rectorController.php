<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\rectorService;

class rectorController extends Controller
{
    private $service;
    public function __construct(rectorService $rectorService)
    {
        $this->service = $rectorService;
    }

    public function rector()
    {
        return response()->json($this->service->listaRectores());
    }
}

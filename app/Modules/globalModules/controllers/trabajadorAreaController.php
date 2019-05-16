<?php
namespace App\Modules\globalModules\controllers;

use App\Http\Controllers\Controller;
use App\Modules\globalModules\service\bussiness\trabajadorAreaService;

class trabajadorAreaController extends Controller
{
    private $service;
    public function __construct(trabajadorAreaService $trabajadorAreaService)
    {
        $this->service = $trabajadorAreaService;
    }

    public function trabajadorArea()
    {
        return response()->json($this->service->listaTrabajadorAreas());
    }
}

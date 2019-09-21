<?php

namespace App\Modules\BienestarUniversitario\Controllers\restControllers;

use App\Http\Controllers\Controller;
use App\Modules\BienestarUniversitario\service\bussiness\obuSolicitudRequisitoArchivosService;
use Illuminate\Http\Request;

/**
 * IndexController
 *
 * Controller to house all the functionality directly
 * related to the ModuleOne.
 */
class obuSolicitudRequisitoArchivosController extends Controller
{
    private $service;
    public function __construct(obuSolicitudRequisitoArchivosService $service)
    {
        $this->service = $service;
    }
    public function create(Request $request)
    {
        return $this->service->create($request);
    }
}

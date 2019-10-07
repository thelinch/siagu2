<?php

namespace App\Modules\BienestarUniversitario\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\BienestarUniversitario\service\bussiness\requisitoArchivoService;

/**
 * IndexController
 *
 * Controller to house all the functionality directly
 * related to the ModuleOne.
 */
class requisitoArchivoController extends Controller
{
    private $service;
    function __construct(requisitoArchivoService $service)
    {
        $this->service = $service;
    }

    function create(Request $request)
    {
        return $this->service->create($request);
    }
}

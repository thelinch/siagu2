<?php

namespace  App\Modules\BienestarUniversitario\Controllers\restControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\BienestarUniversitario\service\bussiness\ampliacionService;

class ampliacionController extends Controller
{
    private $service;
    public function __construct(ampliacionService $ampliacionService)
    {
        $this->service = $ampliacionService;
    }
    public function create(Request $request)
    {
        return response()->json($this->service->create($request));
    }
}

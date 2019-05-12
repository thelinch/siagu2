<?php

namespace  App\Modules\GradosyTitulos\Controllers\restControllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Modules\globalModules\Models\Alumno;
use Illuminate\Support\Facades\DB;
use App\Modules\globalModules\service\bussiness\alumnoService;
class alumnoController extends Controller{

private $service;
    public function __construct(alumnoService $alumnoService)
    {
        $this->service = $alumnoService;
    }

    public function alumnofiltradotipo(){
      return response()->json($this->service->listaAlumnosPregrado(),200);
        
    }
}
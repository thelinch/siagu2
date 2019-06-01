<?php

namespace  App\Modules\BienestarUniversitario\Controllers\restControllers;


use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\bussiness\servicioService;
use App\Http\Controllers\Controller;


class servicioController extends Controller
{
    private $serviceService;
    public function __construct(servicioService $servicioParametro)
    {
        $this->serviceService = $servicioParametro;
    }
    public function all()
    {
        return response()->json($this->serviceService->all());
    }
    public function store(Request $request)
    {
        return response()->json($this->serviceService->create($request), 200);
    }
    public function edit($id, Request $request)
    {
        return response()->json($this->serviceService->edit($id, $request->json()->all()));
    }
    public function delete($id)
    {
        return response()->json($this->serviceService->delete($id));
    }
    public function activarServicio(Request $request)
    {
        return  response()->json($this->serviceService->activarServicio($request), 200);
    }
    public function requisitosPorIdServicio(Request $request)
    {
        return response()->json($this->serviceService->requisitosPorIdServicio($request), 200);
    }
    public function alumnosPorIdServicio(Request $request)
    {
        return response()->json($this->serviceService->todososAlumnosPorIdServicio($request), 200);
    }
    public function serviciosActivados()
    {
        return response()->json($this->serviceService->serviciosActivados(), 200);
    }
    public function requisitosPorArrayServicio(Request $arrayServicio)
    {
        return response()->json($this->serviceService->listarRequisitosDeComedorYInternadoYTipoAlumno($arrayServicio));
    }
    /* public function registroServiciosPorAlumno(Request $request)
    {
        return response()->json($this->serviceService->registroServiciosPorAlumno($request), 200);
    }*/
    public function listaServiciosPorAlumno(Request $request)
    { }
}

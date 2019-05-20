<?php

namespace  App\Modules\BienestarUniversitario\Controllers\restControllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Modules\BienestarUniversitario\service\bussiness\alumnoService;
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;
use App\Modules\BienestarUniversitario\service\bussiness\requisitoService;
use App\Modules\BienestarUniversitario\Repository\Models\Tipo;

class requisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $requisitoService;
    public function __construct(requisitoService $requisitoService)
    {
        $this->requisitoService = $requisitoService;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // exit;
        // return response()->json(Requisito::create($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requisitoObject = $request->json()->all();
        return   response()->json($this->requisitoService->create($request), 200);
        // return $request->except("tipo");
        //
    }
    public function all()
    {
        return response()->json($this->requisitoService->all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //
        return    $this->requisitoService->edit($id, $request->json()->all());
    }
    public function delete($id)
    {
        return    $this->requisitoService->delete($id);
    }
    public function todos_tiposRequisito()
    {
        return  response()->json(Tipo::where("estado", 1)->get());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateTipo(Request $request)
    {
        return $this->requisitoService->updateTipo($request);
    }
    public function updateServicio(Request $request)
    {
        return $this->requisitoService->updateServicio($request);
    }
    public function getArchivosPorRequisitoId(Request $request)
    {
        return $this->requisitoService->getArchivosPorRequisitoId($request);
    }
    public function cambiarActualizacion(Request $request)
    {
        return $this->requisitoService->cambiarActualizacion($request);
    }
    public function listarArchivosPorServicio(Request $request)
    {
        return response()->json($this->requisitoService->listarArchivosPorServicio($request));
    }
}

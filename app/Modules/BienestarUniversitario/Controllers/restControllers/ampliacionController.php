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
    public function listaAmpliacionesPorServicio(Request $request)
    {
        return response()->json($this->service->listarAmpliacionPorServicioId($request));
    }
    public function pruebaRequest(Request $request)
    {
        $secret_key = "faas3c1e3a3c8ae56r8g845e0ba2tb3ccv";
        $json_string = json_encode($request->json()->all());
        $md5_hex_string = md5($json_string . $secret_key);
        // $sign = base64_encode(hex2bin($md5_hex_string));
        return response()->json($md5_hex_string);
        //   return response($json_string);
    }
}

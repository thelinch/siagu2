<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\ServicioRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Modules\globalModules\Models\Alumno;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;

class servicioRepository implements ServicioRepositoryInterface
{
    private $model;
    public function __construct(Servicio $servicio)
    {
        $this->model = $servicio;
    }
    public function all()
    {
        return $this->model::where("estado", 1)->get();
    }
    public function find($id)
    {

        return $this->model::where("id", "=", $id)->first();
    }
    public function delete($id)
    {
        $modelDelete = $this->find($id);
        $modelDelete->estado = 0;
        foreach ($modelDelete->requisitos()->get() as $requisito) {
            $modelDelete->requisitos()->updateExistingPivot($requisito->id, ['estado' => false]);
        }
        $modelDelete->save();
        return  $modelDelete;
    }
    public function create(Request $data)
    {
        $modelObjeto = $data->json()->all();
        $modelCreate = $this->model::create(
            [
                "nombre" => $modelObjeto["nombre"],
                "total" => $modelObjeto["total"],
                "vacantesHombre" => $modelObjeto["vacantesHombre"] != null ? $modelObjeto["vacantesHombre"] : 0,
                "vacantesMujer" => $modelObjeto["vacantesMujer"] != null ? $modelObjeto["vacantesMujer"] : 0,
                "icono" => $modelObjeto["icono"] != null ? $modelObjeto["icono"] : "fa-eye-slash",
                "codigoMatricula" => $modelObjeto["codigoMatricula"]
            ]
        );
        return $this->find($modelCreate->id);
    }
    public function edit($id, array $data)
    {
        $modelServicio = $this->find($id);
        $modelServicio->nombre = $data["nombre"];
        $modelServicio->total = $data["total"];
        $modelServicio->vacantesHombre = $data["vacantesHombre"];
        $modelServicio->vacantesMujer = $data["vacantesMujer"];
        $modelServicio->codigoMatricula = $data["codigoMatricula"];
        $modelServicio->icono = $data["icono"];
        $modelServicio->save();
        return $this->find($modelServicio->id);
    }

    public function activarServicio(Request $request)
    {
        $jsonServicio = $request->json()->all();
        $modelServicio = $this->find($jsonServicio["id"]);
        $modelServicio->fechaInicio = $jsonServicio["fechaInicio"];
        $modelServicio->fechaFin =  $jsonServicio["fechaFin"];
        $modelServicio->activador = true;
        $modelServicio->save();
        return $modelServicio;
    }
    public function requisitosPorIdServicio(Request $request)
    {
        $jsonModel = $request->json()->all();
        $modelServicio = $this->find($jsonModel["id"]);
        return $modelServicio->requisitos()->get();
    }
    public function todososAlumnosPorIdServicio(Request $request)
    {
        $jsonModel = $request->json()->all();
        $modelServicio = $this->find($jsonModel["id"]);
        return "esta por arreglar";
    }
    public function serviciosActivados()
    {
        return $this->model->where("activador", "=", true)->where("estado", "=", true)->get();
    }
    public function requisitosPorArrayServicio(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $listaServiciosSolicitados = $cuerpoPeticion["listaServiciosSolicitados"];
        $requisitosRegistrados = DB::table('alumnos')
            ->join("alumno_requisitos", "alumno_requisitos.alumno_id", "=", "alumnos.id")
            ->where("alumnos.id", "=", $cuerpoPeticion["idAlumno"])
            ->where("alumno_requisitos.codigoMatricula", "=", $cuerpoPeticion["codigoMatricula"])
            ->select("alumno_requisitos.requisito_id as id")->distinct()->get();
        $requisitosRegistrados = array_map(function ($object) {
            return $object->id;
        }, $requisitosRegistrados);
        $requisitos = DB::table('servicios')
            ->join("serviciorequisitos", "serviciorequisitos.servicio_id", "=", "servicios.id")
            ->join("requisitos", "requisitos.id", "=", "serviciorequisitos.requisito_id")
            ->join("requisitotipos", "requisitotipos.requisito_id", "=", "requisitos.id")
            ->join("tipos", "tipos.id", "=", "requisitotipos.tipo_id")->select("requisitos.*")->distinct()
            ->whereIn("serviciorequisitos.servicio_id", $listaServiciosSolicitados)->whereNotIn("serviciorequisitos.requisito_id", $requisitosRegistrados)->where("serviciorequisitos.estado", "=", 1)->where("tipos.id", "=", 1)->orderBy("requisitos.requerido", "DESC")->get();
        return $requisitos;
    }
    /*  public function registroServiciosPorAlumno(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $servicioSolicitadoCreado = ServicioSolicitado::create([
            "alumno_id" => $cuerpoPeticion["idAlumno"],
            "estado_servicio_id" => 1,
            "fechaRegistro" => Carbon::now(),
            "codigoMatricula" => $cuerpoPeticion["codigoMatricula"]
        ]);

        foreach ($cuerpoPeticion["listaDeServicioSolicitados"] as $servicioSolicitado) {
            $servicioSolicitadoCreado->servicios()->attach($servicioSolicitado);
        }
        return ServicioSolicitado::find($servicioSolicitadoCreado->id)->with("estadoServicio")->with("servicios")->first();
    }*/
    public function listaServiciosPorAlumno(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
    }
}

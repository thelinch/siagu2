<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use App\Modules\BienestarUniversitario\Repository\interfaces\alumnoRequisitoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\Models\AlumnoRequisito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modules\BienestarUniversitario\Repository\Models\estadoArchivoRequisito;

class alumnoRequisitoRepository implements alumnoRequisitoRepositoryInterface
{
    private $model;
    public function __construct(AlumnoRequisito $model)
    {
        $this->model = $model;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    { }
    public function edit($id, array $data)
    { }
    public function listaArchivoPorAlumnoRequisito(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return DB::table('alumno_requisitos')
            ->join("archivo_alumno_requisitos", "archivo_alumno_requisitos.alumno_requisito_id", "=", "alumno_requisitos.id")
            ->join("estado_archivos_requisitos", "estado_archivos_requisitos.archivo_alumno_requisito_id", "=", "archivo_alumno_requisitos.id")
            ->join("estado_archivos", "estado_archivos.id", "=", "estado_archivos_requisitos.estado_archivo_id")
            ->select("alumno_requisitos.*", "estado_archivos.*")
            ->where("alumno_requisitos.id", "=", $cuerpoPeticion["id"])
            ->OrWhere("estado_archivos_requisitos.estado", "=", true)->get();
        //return $this->model::find($cuerpoPeticio["id"])->archivos()->with("estadosArchivo")->get();
    }
    public function listaAlumnoRequisitoPorAlumnoYSemestre(Request $request)
    {
        $cuerpoPeticio = $request->json()->all();

        return $this->model::where("alumno_id", $cuerpoPeticio["idAlumno"])
            ->where("codigoMatricula", "=", $cuerpoPeticio["codigoMatricula"])->with(["requisito", "archivos.estadosArchivo"])->get();
    }
    public function historialDeEstadosPorArchivo(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return estadoArchivoRequisito::where("archivo_alumno_requisito_id", "=", $cuerpoPeticion["idArchivo"])->orderBy("estado")->with("estadoArchivo")->get();
    }
}

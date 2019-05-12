<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\alumnoServiceInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Models\Alumno;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;
use App\Modules\BienestarUniversitario\Repository\Models\AlumnoRequisito;

class alumnoService implements alumnoServiceInterface
{
    private $repository;
    /* public function __construct(alumnoRepositoryInterface $alumnoRepository)
    {
        $this->repository = $alumnoRepository;
    }*/
    public function all()
    {

        return $this->repository->all();
    }
    public function find($id)
    {
        return $this->repository->find($id);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function create(Request $data)
    {
        return $this->repository->create($data);
    }
    public function edit($id, array $data)
    {
        return $this->repository->edit($id, $data);
    }
    public function listaAlumnosPregrado()
    {
        return Alumno::with(["persona", "escuelaProfesional"])->where("grado_alumno", true)->get();
        /* return DB::table("alumnos")
            ->join("personas", "personas.id", "=", "alumnos.persona_id")
            ->join("tipos_documentos", "tipos_documentos.id", "=", "personas.tipo_documento_id")
            ->select("alumnos.*","personas.*","tipos_documentos.*")
            ->where("alumnos.grado_alumno", "=", true)->get();*/
    }
    public function buscarAlumnoConRequisitosYServiciosPorId(Request $request)
    {
        $cuerpoPeticio = $request->json()->all();
        return Alumno::find($cuerpoPeticio["id"])->with("requisitos")->with("servicios")->first();
    }
    public function listaServiciosPorAlumno(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $listaServiciosPorAlumno = ServicioSolicitado::with("servicios")->with("estadoServicio")
            ->where("codigoMatricula", $cuerpoPeticion["semestreActual"])
            ->where("alumno_id", "=", $cuerpoPeticion["idAlumno"])->first();
        /*AlumnoServicio::where("alumno_id", "=", $cuerpoPeticion["idAlumno"])
            ->where("codigoMatricula", "=", $cuerpoPeticion["semestreActual"])->with("estado")->with("servicio")
            ->get();*/
        /* $listaServiciosPorAlumno = DB::table("servicios")->join("alumno_servicios", "alumno_servicios.servicio_id", "=", "servicios.id")
            ->join("alumnos", "alumnos.id", "=", "alumno_servicios.alumno_id")->select("servicios.*")->where("alumno_servicios.codigoMatricula", "=", $cuerpoPeticion["semestreActual"])
            ->where("alumnos.id", "=", $cuerpoPeticion["idAlumno"])->get();*/
        return empty($listaServiciosPorAlumno) ? null : $listaServiciosPorAlumno;
    }
    public function listarRequisitosPorAlumnoYSemestreActual(Request $request)
    {
        $cuerpoPeticio = $request->json()->all();
        //return AlumnoRequisito::find(1)->archivos()->with("estadoArchivo")->get();
        return  AlumnoRequisito::where("alumno_id", $cuerpoPeticio["idAlumno"])
            ->where("codigoMatricula", "=", $cuerpoPeticio["codigoMatricula"])->with(["requisito"])->get();
        /*return  Alumno::find($cuerpoPeticio["idAlumno"])->alumnoRequisitos()
            ->where("codigoMatricula", "=", $cuerpoPeticio["codigoMatricula"])
            ->with("requisito")
            ->with("archivos")->get();*/
    }
}

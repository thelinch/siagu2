<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use App\Modules\globalModules\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class alumnoRepository implements alumnoRepositoryInterface
{
    private $model;
    public function __construct(Alumno $alumno)
    {
        $this->model = $alumno;
    }
    public function all()
    {
        return $this->model->where("estado", "=", 1);
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function delete($id)
    { }
    public function create(Request $data)
    { }
    public function edit($id, array $data)
    { }
    public function listaAlumnosPregrado()
    {
        return $this->model->with("persona")->where("grado_alumno", true)->get();
    }
    public function buscarAlumnoConRequisitosYServiciosPorId(Request $request)
    {
        $contenido = $request->json()->all();
        return $this->find($contenido["id"])->with("servicios")->with("requisitos")->get();
    }
    public function listaServiciosPorAlumno(Request $request)
    { }
    public function listaRequisitoPorAlumnoYCodigoMatricula(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return DB::table('alumnos')
            ->join("alumno_requisitos", "alumno_requisitos.alunmo_id", "=", "alunmos.id")
            ->join("requisitos", "alumno_requisitos.requisitos_id", "=", "requisitos.id")->select("requisitos.*")
            ->where("alumnos.id", "=", $cuerpoPeticion["idAlumno"])
            ->where("alumno_requisitos.codigoMatricula", "=", $cuerpoPeticion["codigoMatricula"])->get();
    }
    public function listarRequisitosPorAlumnoYSemestreActual(Request $request)
    { }
}

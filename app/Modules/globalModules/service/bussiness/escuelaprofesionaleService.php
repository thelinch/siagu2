<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\escuelaprofesionaleServiceInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Models\EscuelaProfesionale;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;

class escuelaprofesionaleService implements escuelaprofesionaleServiceInterface
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
    public function listaEscuelasProfesionales()
    {
          return EscuelaProfesionale::with("facultad_oficina")->where("estado", true)->get();
       /* return DB::table("alumnos")
            ->join("personas", "personas.id", "=", "alumnos.persona_id")
            ->join("tipos_documentos", "tipos_documentos.id", "=", "personas.tipo_documento_id")
            ->select("alumnos.*","personas.*","tipos_documentos.*")
            ->where("alumnos.grado_alumno", "=", true)->get();*/
    }
}

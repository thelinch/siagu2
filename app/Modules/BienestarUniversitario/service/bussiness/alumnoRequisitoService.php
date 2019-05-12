<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\Repository\interfaces\alumnoRequisitoRepositoryInterface;
use App\Modules\BienestarUniversitario\service\interfaces\alumnoRequisitoServiceInterface;

class alumnoRequisitoService implements alumnoRequisitoServiceInterface
{

    private $repository;
    public function __construct(alumnoRequisitoRepositoryInterface  $repositorio)
    {

        $this->repository = $repositorio;
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
        return $this->repository->listaArchivoPorAlumnoRequisito($request);
    }
    public function listaAlumnoRequisitoPorAlumnoYSemestre(Request $request)
    {
        return $this->repository->listaAlumnoRequisitoPorAlumnoYSemestre($request);
    }
    public function historialDeEstadosPorArchivo(Request $request)
    {
        return $this->repository->historialDeEstadosPorArchivo($request);
    }
}

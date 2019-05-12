<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\interfaces\servicioSolicitadoServiceInterface;

class servicioSolicitadoService implements servicioSolicitadoServiceInterface
{
    private $repository;
    public function __construct(servicioSolicitadoRepositoryInterface $servicioSolicitado)
    {
        $this->repository = $servicioSolicitado;
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
    public function  listaServicioSolicitadoPorSemestreActual(Request $request)
    {
        return $this->repository->listaServicioSolicitadoPorSemestreActual($request);
    }
    public function registroServicioSolicitadoPorAlumno(Request $request)
    {
        return $this->repository->registroServicioSolicitadoPorAlumno($request);
    }
}

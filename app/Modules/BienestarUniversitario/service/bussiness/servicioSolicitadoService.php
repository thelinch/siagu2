<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\interfaces\servicioSolicitadoServiceInterface;
use App\Modules\globalModules\Repository\implementationInterface\cicloAcademicoRepository;

class servicioSolicitadoService implements servicioSolicitadoServiceInterface
{
    private $repository;
    private $cicloRepository;
    public function __construct(servicioSolicitadoRepositoryInterface $servicioSolicitado, cicloAcademicoRepository $cicloRepository)
    {
        $this->repository = $servicioSolicitado;
        $this->cicloRepository = $cicloRepository;
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
        $cicloActual = $this->cicloRepository->cicloAcademicoActual();
        return $this->repository->listaServicioSolicitadoPorSemestreActual($cicloActual->nombre);
    }
    public function registroServicioSolicitadoPorAlumno(Request $request)
    {
        return $this->repository->registroServicioSolicitadoPorAlumno($request);
    }
    public function servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual(Request $request)
    {
        $cicloActual = $this->cicloRepository->cicloAcademicoActual();
        $cuerpoPeticion = $request->json()->all();
        return $this->repository->servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual($cuerpoPeticion["idAlumno"], $cicloActual->nombre);
    }
}

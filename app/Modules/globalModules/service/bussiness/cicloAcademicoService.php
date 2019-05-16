<?php
namespace App\Modules\globalModules\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\globalModules\service\interfaces\cicloAcademicoServiceInterface;
use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\ServicioRepositoryInterface;

class cicloAcademicoService implements cicloAcademicoServiceInterface
{
    private $repository;
    private $repositoryServicio;
    public function __construct(cicloAcademicoRepositoryInterface $repository, ServicioRepositoryInterface $repositoryServicio)
    {
        $this->repository = $repository;
        $this->repositoryServicio = $repositoryServicio;
    }
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
    public function modificarCicloAcademicoPorServicio(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();

        $modelServicio = $this->repositoryServicio->reiniciarServicioYActualizarCicloAcademico($cuerpoPeticion["id"], $cuerpoPeticion["nombreCicloAcademico"]);
    }
}

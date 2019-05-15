<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\interfaces\ampliacionServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\ampliacionRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\ServicioRepositoryInterface;

class ampliacionService implements ampliacionServiceInterface
{
    private $repository;
    private $servicioRepository;
    public  function __construct(ampliacionRepositoryInterface $repository, ServicioRepositoryInterface $servicioRepository)
    {
        $this->repository = $repository;
        $this->servicioRepository = $servicioRepository;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        $this->repository->create($data);
        return $this->servicioRepository->edicioTotalNumeroVaronesMujeresPorServicio($data);
    }
    public function edit($id, array $data)
    { }
    public function  listarAmpliacionPorServicioId(Request $request)
    {
        return $this->repository->listarAmpliacionPorServicioId($request);
    }
}

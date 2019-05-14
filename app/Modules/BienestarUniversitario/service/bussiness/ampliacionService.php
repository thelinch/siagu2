<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\service\interfaces\ampliacionServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\ampliacionRepositoryInterface;

class ampliacionService implements ampliacionServiceInterface
{
    private $repository;
    public  function __construct(ampliacionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        return $this->repository->create($data);
    }
    public function edit($id, array $data)
    { }
    public function  listarAmpliacionPorServicioId(Request $request)
    { }
}

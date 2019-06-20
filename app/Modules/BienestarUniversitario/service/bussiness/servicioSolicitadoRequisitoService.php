<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\service\interfaces\servicioSolicitadoRequisitoServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRequisitoInterface;
use Illuminate\Http\Request;

class servicioSolicitadoRequisitoService implements servicioSolicitadoRequisitoServiceInterface
{
    private $repository;
    public function __construct(servicioSolicitadoRequisitoInterface $repository)
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
        return  $this->repository->create($data);
    }
    public function edit($id, array $data)
    { }
}

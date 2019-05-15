<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\denominacionGradoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\denominacionGradoRepositoryInterface;

class denominacionGradoService implements denominacionGradoServiceInterface
{
    private $repository;
    public function __construct(denominacionGradoRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
    public function listaDenominacionPorEscuelaProfesionalYAlumnoBachiller(Request $request)
    {

        return  $this->repository->listaDenominacionPorEscuelaProfesionalYAlumnoBachiller($request);
    }
}

<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\tipoDiplomaServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\tipoDiplomaRepositoryInterface;

class tipoDiplomaService implements tipoDiplomaServiceInterface
{
    private $repository;
    public function __construct(tipoDiplomaRepositoryInterface $repository)
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
    public function listaTipoDiploma(Request $request)
    {

        return  $this->repository->listaTipoDiploma($request);
    }
}

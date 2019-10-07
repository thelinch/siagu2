<?php

namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\Repository\interfaces\requisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\service\interfaces\requisitoArchivoServiceInterface;
use Illuminate\Http\Request;

class requisitoArchivoService implements requisitoArchivoServiceInterface
{
    private $repository;
    function __construct(requisitoArchivoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    function create(Request $request)
    {
        return $this->repository->create($request);
    }
    public function all()
    { }

    public function find($id)
    { }
    public function delete($id)
    { }

    public function  edit($id, array $data)
    { }
}

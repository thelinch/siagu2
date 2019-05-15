<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\decanoFacultadServiceInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\Models\DecanoFacultad;

class decanoFacultadService implements decanoFacultadServiceInterface
{
    private $repository;
    /* public function __construct(alumnoRepositoryInterface $alumnoRepository)
    {
        $this->repository = $alumnoRepository;
    }*/
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
    public function listaDecanoFacultades()
    {
          return DecanoFacultad::with("Docente.Persona")->where("estado", true)->get();
   
    }
}

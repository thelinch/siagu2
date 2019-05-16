<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\registroAlumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\registroAlumnoGraduadoTituladoRepositoryInterface;

class registroAlumnoGraduadoTituladoService implements registroAlumnoGraduadoTituladoServiceInterface
{
    private $repository;
    public  function __construct(registroAlumnoGraduadoTituladoRepositoryInterface $registroAlumnoGraduadoTituladoRepositoryInterface)
    {
        $this->repository = $registroAlumnoGraduadoTituladoRepositoryInterface;
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
    {
        return $this->repository->edit($id, $data);
    }
}

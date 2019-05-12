<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\alumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;

class alumnoGraduadoTituladoService implements alumnoGraduadoTituladoServiceInterface
{
    private $repository;
    public  function __construct(alumnoGraduadoTituladoRepositoryInterface $alumnoGraduadoTituladoRepositoryInterface)
    {
        $this->repository = $alumnoGraduadoTituladoRepositoryInterface;
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
}

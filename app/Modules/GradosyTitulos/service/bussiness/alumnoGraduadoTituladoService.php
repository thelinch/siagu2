<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\alumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use Illuminate\Support\Collection;

//use Illuminate\Support\Collection as Collection;

class alumnoGraduadoTituladoService implements alumnoGraduadoTituladoServiceInterface
{
    private $repository;
    private $alumnoRepository;

    public  function __construct(alumnoGraduadoTituladoRepositoryInterface $alumnoGraduadoTituladoRepositoryInterface, alumnoRepositoryInterface $alumnoRepository)
    {
        $this->repository = $alumnoGraduadoTituladoRepositoryInterface;
        $this->alumnoRepository = $alumnoRepository;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {

        return   $this->repository->create($data);
    }
    public function edit($id, array $data)
    {
        return $this->repository->edit($id, $data);
    }

    public function listaAlumnosBachilleres()
    {

        $listaAlumno = collect();
        $listaALumnoGraduadoTitulado = $this->repository->all();
        foreach ($listaALumnoGraduadoTitulado as $alumnoGraduado) {
            $listaAlumno->push(
                array(
                    "alumno" => $this->alumnoRepository->buscarAlumnoDatosPersona($alumnoGraduado->alumno_general_id),
                    "alumno_graduado" => $alumnoGraduado
                )
            );
        }
        return $listaAlumno;
    }
}

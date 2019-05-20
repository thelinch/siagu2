<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\registroAlumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\registroAlumnoGraduadoTituladoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;

class registroAlumnoGraduadoTituladoService implements registroAlumnoGraduadoTituladoServiceInterface
{
    private $repository;
    private $alumnoRepository;
    private $modelAlumno;
    private $alumnoGraduadoRepository;
    public  function __construct(
        registroAlumnoGraduadoTituladoRepositoryInterface $registroAlumnoGraduadoTituladoRepositoryInterface,
        alumnoRepositoryInterface $alumnoRepository,
        alumnoGraduadoTituladoRepositoryInterface $alumnoGraduadoTituladoRepository
    ) {

        $this->repository = $registroAlumnoGraduadoTituladoRepositoryInterface;
        $this->alumnoRepository = $alumnoRepository;
        $this->alumnoGraduadoRepository = $alumnoGraduadoTituladoRepository;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        $cuerpoPeticion = $data->json()->all();
        $modelAlumnoGraduadoTitulado = $this->alumnoGraduadoRepository->find($cuerpoPeticion["alumno_graduado_id"]);
        $modelEdit = $this->alumnoRepository->modificarElGradoPorAlumno($modelAlumnoGraduadoTitulado->alumno_general_id);
        $datosEnviar = array(
            "alumno" => $modelEdit,
            "alumno_graduado" => $this->repository->create($data)
        );
        return $datosEnviar;
    }
    public function edit($id, array $data)
    {
        return $this->repository->edit($id, $data);
    }
}

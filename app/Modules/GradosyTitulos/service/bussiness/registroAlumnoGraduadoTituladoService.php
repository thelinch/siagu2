<?php
namespace App\Modules\GradosyTitulos\service\bussiness;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\service\interfaces\registroAlumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\registroAlumnoGraduadoTituladoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\decanoFacultadRepositoryInterface;

class registroAlumnoGraduadoTituladoService implements registroAlumnoGraduadoTituladoServiceInterface
{
    private $repository;
    private $alumnoRepository;
    private $modelAlumno;
    private $alumnoGraduadoRepository;
    private $decanoFacultadRepository;
    public  function __construct(
        registroAlumnoGraduadoTituladoRepositoryInterface $registroAlumnoGraduadoTituladoRepositoryInterface,
        alumnoRepositoryInterface $alumnoRepository,
        alumnoGraduadoTituladoRepositoryInterface $alumnoGraduadoTituladoRepository,
        decanoFacultadRepositoryInterface $decanoFacultadRepository

    ) {
        $this->decanoFacultadRepository = $decanoFacultadRepository;
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
            "registro_alumno_graduado" => $this->repository->create($data),
            "alumno_graduado" => $this->alumnoGraduadoRepository->find($cuerpoPeticion["alumno_graduado_id"]),
            "decano" => $this->decanoFacultadRepository->find($cuerpoPeticion["director_decano"]["id"])
        );
        return $datosEnviar;
    }
    public function edit($id, array $data)
    {
        return $this->repository->edit($id, $data);
    }
}

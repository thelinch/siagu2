<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\service\interfaces\servicioServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use Illuminate\Support\Collection;

class servicioService implements servicioServiceInterface
{
    private $repositoy;
    private $cicloAcademicoRepository;
    private $servicioSolicitadoRepository;
    private $alumnoRepository;
    public function __construct(
        servicioRepositoryInterface $repositoryServicio,
        cicloAcademicoRepositoryInterface $cicloAcademicoRepository,
        servicioSolicitadoRepositoryInterface $servicioSolicitadoRepository,
        alumnoRepositoryInterface $alumnoRepository
    ) {
        $this->repositoy = $repositoryServicio;
        $this->cicloAcademicoRepository = $cicloAcademicoRepository;
        $this->servicioSolicitadoRepository = $servicioSolicitadoRepository;
        $this->alumnoRepository = $alumnoRepository;
    }
    public function all()
    {
        return $this->repositoy->all();
    }
    public function find($id)
    {
        return $this->repositoy->find($id);
    }
    public function delete($id)
    {
        return $this->repositoy->delete($id);
    }
    public function create(Request $data)
    {
        return $this->repositoy->create($data);
    }
    public function edit($id, array $data)
    {
        return $this->repositoy->edit($id, $data);
    }
    public function activarServicio(Request $request)
    {
        return $this->repositoy->activarServicio($request);
    }
    public function requisitosPorIdServicio(Request $request)
    {
        return $this->repositoy->requisitosPorIdServicio($request);
    }
    public function todososAlumnosPorIdServicio(Request $request)
    {
        return $this->repositoy->todososAlumnosPorIdServicio($request);
    }
    public function serviciosActivados()
    {
        return $this->repositoy->serviciosActivados();
    }
    public function listarRequisitosDeComedorYInternadoYTipoAlumno(Request $request)
    {
        $alumno = $this->alumnoRepository->buscarAlumnoPorIdConTipoAlumno(1);
        $listaRequisitosPorListaServicios = $this->repositoy->listarRequisitosPorListaDeServicio(array(1, 2));
        $requisitos = collect();
        $cicloAcademicoActual = $this->cicloAcademicoRepository->cicloAcademicoActual();
        if ($alumno["tipo_alumno"]["nombre"] == "ANTIGUO") {
            $requisitos = $listaRequisitosPorListaServicios->filter(function ($requisito) {
                return $requisito->tipos->contains("nombre", "ANTIGUO") || $requisito->actualizacion;
            });
        } else {
            $requisitosRegistrados = $this->servicioSolicitadoRepository->listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual($alumno->id, $cicloAcademicoActual->nombre);
            $requisitos = $listaRequisitosPorListaServicios->filter(function ($requisito) {
                return $requisito->tipos->contains("nombre", "INGRESANTE");
            })->whereNotIn("id", $requisitosRegistrados)->toArray();
        }
        return  $requisitos;
    }
    /*public function registroServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->registroServiciosPorAlumno($request);
    }*/
    public function listaServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->listaServiciosPorAlumno($request);
    }
    public function agregarAmpliacionServicioId(Request $request)
    {

        return $this->repositoy->edicioTotalNumeroVaronesMujeresPorServicio($request);;
    }
}

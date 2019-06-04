<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\service\interfaces\servicioServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

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
        $tipoAlumno = $this->alumnoRepository->tipoAlumnoPorIdAlumno(1);
        $listaRequisitosPorListaServicios = $this->repositoy->listarRequisitosPorListaDeServicio(array(1, 2));
        $listaRequisitoPorTipoAlumno = $this->filtradoRequisitoPorElTipoAlumno($tipoAlumno->nombre, $listaRequisitosPorListaServicios);
        $requisitos = collect();
        $cicloAcademicoActual = $this->cicloAcademicoRepository->cicloAcademicoActual();
        $requisitosRegistradosPorCicloActual = $this->servicioSolicitadoRepository->listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual(1, $cicloAcademicoActual->nombre);
        if ($tipoAlumno->nombre == "ANTIGUO") {
            //$requisitos=
            $fechaHoy = Carbon::now();
            $listaRequisitoRegistradoPorServicioSolicitadoPorAlumno = $this->servicioSolicitadoRepository->listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(1);
            foreach ($listaRequisitoRegistradoPorServicioSolicitadoPorAlumno as $requisitoPorServicio) {
                
             }
            /*  foreach ($listaRequisitoPorTipoAlumno as $requisitoPorAlumno) {
               $indiceDeTipo = $requisitoPorAlumno->tipos->search(function ($tipo) {
                    return $tipo->pivot->actualizacion;
                });
                if (is_numeric($indiceDeTipo)) {

                    $requisitoPorAlumno->tipos[$indiceDeTipo]->numero_anios_actualizacion;
                }
            }
            */
            return $this->servicioSolicitadoRepository->listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(1);
        } else {
            $requisitosRegistradosPorCicloActual = $requisitosRegistradosPorCicloActual->map(function ($servicioSolicitadoRequisito) {
                return $servicioSolicitadoRequisito->requisito_id;
            });
            $requisitos = $listaRequisitoPorTipoAlumno->whereNotIn("id", $requisitosRegistradosPorCicloActual)->toArray();
        }

        return  array_merge($requisitos);
    }
    /*public function registroServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->registroServiciosPorAlumno($request);
    }*/
    private function filtradoRequisitoPorElTipoAlumno(string $tipoAlumno,  $listaRequisitosPorListaServicios)
    {
        $arrayLlenado = collect();
        foreach ($listaRequisitosPorListaServicios as $requisitoServicio) {
            $busqueda = $requisitoServicio->tipos->contains(function ($tipo) use ($tipoAlumno) {
                return $tipo->nombre == $tipoAlumno;
            });
            if ($busqueda) {
                $arrayLlenado->push($requisitoServicio);
            }
        }
        return $arrayLlenado;
    }
    public function listaServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->listaServiciosPorAlumno($request);
    }
    public function agregarAmpliacionServicioId(Request $request)
    {

        return $this->repositoy->edicioTotalNumeroVaronesMujeresPorServicio($request);;
    }
}

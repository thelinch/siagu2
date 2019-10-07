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
use App\Modules\bienestarUniversitario\Repository\Models\Requisito;

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
        $cuerpoPeticio = $request->json()->all();
        $tipoAlumno = $this->alumnoRepository->tipoAlumnoPorIdAlumno($cuerpoPeticio["idAlumno"]);
        $listaRequisitosPorListaServicios = $this->repositoy->listarRequisitosPorListaDeServicio($cuerpoPeticio["listaServiciosSolicitados"]);
        $listaRequisitoPorTipoAlumno = $this->filtradoRequisitoPorElTipoAlumno($tipoAlumno->nombre, $listaRequisitosPorListaServicios);
        $requisitos = collect();
        $cicloAcademicoActual = $this->cicloAcademicoRepository->cicloAcademicoActual();
        $requisitosRegistradosPorCicloActual = $this->servicioSolicitadoRepository->listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual($cuerpoPeticio["idAlumno"], $cicloAcademicoActual->nombre);
        if ($tipoAlumno->nombre == "ANTIGUO") {
            $fechaActual = Carbon::now();
            $listaRequisitoParaAntiguo = collect();
            $listaRequisitoRegistradoPorServicioSolicitadoPorAlumno = $this->servicioSolicitadoRepository->listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(1);
            foreach ($listaRequisitoRegistradoPorServicioSolicitadoPorAlumno as $requisitoPorServicio) {
                $requisitoSeleccionado =  $listaRequisitoPorTipoAlumno->filter(function ($requisito) use ($requisitoPorServicio) {
                    return $requisito->id == $requisitoPorServicio->requisito_id;
                })->first();
                if (!is_null($requisitoSeleccionado)) {
                    $pivotTipoAlumno = collect($requisitoSeleccionado["tipos"])->first(function ($tipo) {
                        return $tipo->nombre == "ANTIGUO";
                    })["pivot"];
                    if ($pivotTipoAlumno["actualizacion"] && $this->validarAntiguedadDelRequisito($pivotTipoAlumno["numero_anios_actualizacion"], $requisitoPorServicio->fechaRegistro, $fechaActual)) {
                        $listaRequisitoParaAntiguo->push($requisitoSeleccionado);
                    }
                }
            }
            if (count($listaRequisitoPorTipoAlumno) > count($listaRequisitoRegistradoPorServicioSolicitadoPorAlumno)) {
                $diferenciaLista =   $listaRequisitoPorTipoAlumno->whereNotIn("id", $listaRequisitoRegistradoPorServicioSolicitadoPorAlumno->map(function ($requisitoServicio) {
                    return $requisitoServicio->requisito_id;
                }));
                $listaRequisitoParaAntiguo = $listaRequisitoParaAntiguo->concat($diferenciaLista);
            }
            return $listaRequisitoParaAntiguo;
        } else {
            if (count($requisitosRegistradosPorCicloActual) != 0) {
                $requisitosRegistradosPorCicloActual = $requisitosRegistradosPorCicloActual->map(function ($servicioSolicitadoRequisito) {
                    return $servicioSolicitadoRequisito->requisito_id;
                });
            }
            $requisitos = $listaRequisitoPorTipoAlumno->whereNotIn("id", $requisitosRegistradosPorCicloActual)->toArray();
        }
        return  array_merge($requisitos);
    }
    private function validarAntiguedadDelRequisito(int $numero_anios_antiguedad,  $fechaRegistroRequisito, $fechaActual)
    {
        return $fechaActual->diffInYears($fechaRegistroRequisito) >= $numero_anios_antiguedad;
    }
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

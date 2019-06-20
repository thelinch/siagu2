<?php
namespace App\Modules\BienestarUniversitario\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\BienestarUniversitario\Repository\Models\ServicioSolicitado;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;
use Carbon\Carbon;

class servicioSolicitadoRepository implements servicioSolicitadoRepositoryInterface
{
    private $model;
    public function __construct(ServicioSolicitado $servicioSolicitado)
    {
        $this->model = $servicioSolicitado;
    }
    public function all()
    { }
    public function find($id)
    {

        return $this->model->find($id);
    }
    public function delete($id)
    { }
    public function create(Request $data)
    { }
    public function edit($id, array $data)
    { }
    public function listaServicioSolicitadoPorSemestreActual(string $semestreActual)
    {

        return $this->model->where("codigoMatricula", "=", $semestreActual)
            ->with(["alumno.escuelaProfesional", "alumno.persona", "alumno.tipoAlumno", "servicios", "estadoServicio"])->get();
    }
    public function registroServicioSolicitadoPorAlumno(Request $request, string $codigoMatricula)
    {
        $cuerpoPeticion = $request->json()->all();
        $servicioSolicitado = $this->model->create([
            "alumno_id" => $cuerpoPeticion["idAlumno"],
            "estado_servicio_id" => 1,
            "fechaRegistro" => Carbon::now(),
            "codigoMatricula" => $codigoMatricula,
        ]);
        foreach ($cuerpoPeticion["listaDeServicioSolicitados"] as $servicio) {
            $servicioSolicitado->servicios()->attach($servicio);
        }
        return $this->find($servicioSolicitado->id)->with(["servicios", "estadoServicio"])->first();
    }
    public function listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual(int $idAlumno, string $codigoMatricula)
    {
        $listaServicioSolicitado = $this->model::whereHas("servicios", function ($q) {
            $q->whereIn("nombre", ["COMEDOR", "INTERNADO"]);
        })->where([["alumno_id", "=", $idAlumno], ["codigoMatricula", "=",  $codigoMatricula]])->first();
        if (!is_null($listaServicioSolicitado)) {
            return $this->model->find($listaServicioSolicitado->id)->serviciSolicitadoRequisitos()->get();
        }
        return [];
    }
    public function listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(int $idAlumno)
    {
        $servicioSolicitadoMasActualConRequisitos = $this->model::has("serviciSolicitadoRequisitos")->whereHas("servicios", function ($q) {
            $q->whereIn("nombre", ["COMEDOR", "INTERNADO"]);
        })->where("alumno_id", "=", $idAlumno)->orderBy("fechaRegistro", "desc")->first();
        if (!is_null($servicioSolicitadoMasActualConRequisitos)) {
            return $this->model->find($servicioSolicitadoMasActualConRequisitos->id)->serviciSolicitadoRequisitos()->get();
        }
        return null;
    }
    public function servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual(int $idAlumno, string $codigoMatricula)
    {
        $servicioSolicitado = $this->model->whereHas("servicios", function ($q) {
            $q->whereIn("nombre", ["COMEDOR", "INTERNADO"]);
        })->with(["servicios", "requisitos", "estadoServicio"])->where([["alumno_id", "=", $idAlumno], ["codigoMatricula", "=", $codigoMatricula]])->get();
        return count($servicioSolicitado) > 0 ? $servicioSolicitado->first() : null;
    }
    public function crearServicioSolicitadoRequisitoPorServicioSolicitado(int $idServicioSolicitado, string $codigoMatricula, int $idRequisito)
    {
        $servicioSolicitadoRequisitoCreado = $this->model->find($idServicioSolicitado)->servicioSolicitadoRequisitos()->create([
            "codigoMatricula" => $codigoMatricula,
            "requisito_id" => $idRequisito,
            "fechaRegistro" => Carbon::now()
        ]);
        return $servicioSolicitadoRequisitoCreado;
    }
}

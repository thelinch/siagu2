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
    public function listaServicioSolicitadoPorSemestreActual(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("codigoMatricula", "=", $cuerpoPeticion["codigoMatricula"])
            ->with(["alumno.escuelaProfesional", "alumno.persona", "alumno.tipoAlumno", "servicios", "estadoServicio"])->get();
    }
    public function registroServicioSolicitadoPorAlumno(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $servicioSolicitado = $this->model->create([
            "alumno_id" => $cuerpoPeticion["idAlumno"],
            "estado_servicio_id" => 1,
            "fechaRegistro" => Carbon::now(),
            "codigoMatricula" => $cuerpoPeticion["codigoMatricula"],
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
        })->where([["alumno_id", "=", $idAlumno], ["codigoMatricula", "=", $codigoMatricula]])->first();
        if (!is_null($listaServicioSolicitado)) {
            return $this->model->find($listaServicioSolicitado->id)->serviciSolicitadoRequisitos()->get()->map(function ($servicioSolicitadoRequisito) {
                return $servicioSolicitadoRequisito->requisito_id;
            });
        }
        return [];
    }
}

<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\Models\cicloAcademico;
use App\Modules\BienestarUniversitario\Repository\Models\cicloAcademicoServicios;

class cicloAcademicoRepository implements cicloAcademicoRepositoryInterface
{
    private $model;
    private $cicloAcademicoServicioModel;
    public function __construct(cicloAcademico $cicloAcademico, cicloAcademicoServicios $cicloAcademicoServicioModel)
    {
        $this->model = $cicloAcademico;
        $this->cicloAcademicoServicioModel = $cicloAcademicoServicioModel;
    }
    public function all()
    {
        return $this->model->where("estado", "=", 1)->get();
    }
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
    public function modificarCicloAcademicoPorServicio(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        $this->cicloAcademicoServicioModel->create([
            "servicio_id" => $cuerpoPeticion["idServicioSelecionado"],
            "ciclo_academico_id" => $cuerpoPeticion["idCicloAcademico"]
        ]);
    }
    public function cicloAcademicoActual()
    {
        return $this->model->where("actual", true)->first();
    }
}

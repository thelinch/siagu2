<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\Models\cicloAcademico;

class cicloAcademicoRepository implements cicloAcademicoRepositoryInterface
{
    private $model;
    public function __construct(cicloAcademico $cicloAcademico)
    {
        $this->model = $cicloAcademico;
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
    { }
}

<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use App\Modules\globalModules\Models\cicloAcademico;

class cicloAcademicoRepository implements cicloAcademicoRepositoryInterface
{
    private $model;
    public function __construct(cicloAcademico $cicloAcademico)
    {
        $this->model = $cicloAcademico;
    }
    public function all()
    {
        return $this->model->where("estado", "=", 1);
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
}

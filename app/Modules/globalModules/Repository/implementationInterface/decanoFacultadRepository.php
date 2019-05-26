<?php
namespace App\Modules\globalModules\Repository\implementationInterface;

use App\Modules\globalModules\Repository\interfaces\decanoFacultadRepositoryInterface;
use App\Modules\globalModules\Repository\Models\DecanoFacultad;
use Illuminate\Http\Request;
class decanoFacultadRepository implements decanoFacultadRepositoryInterface
{
    private $model;
    public function __construct(DecanoFacultad $decanoFacultad)
    {
        $this->model = $decanoFacultad;
    }
    public function all()
    {
        return $this->model->where("estado", "=", 1);
    }
    public function find($id)
    {
        return $this->model->with("Docente.Persona")->find($id);
    }
    public function delete($id)
    { }
    public function create(Request $data)
    { }
    public function edit($id, array $data)
    { }
}

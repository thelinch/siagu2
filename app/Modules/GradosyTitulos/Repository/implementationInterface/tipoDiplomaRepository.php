<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\tipo_diploma;
use App\Modules\GradosyTitulos\Repository\interfaces\empresaRepositoryInterface;

class tipoDiplomaRepository implements empresaRepositoryInterface
{
    private $model;
    public function __construct(tipo_diploma $model)
    {
        $this->model = $model;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    { }
    public function edit($id, array $data)
    { }
    public function listaTipoDiploma(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("estado", "=", 1)->get();

    }
}

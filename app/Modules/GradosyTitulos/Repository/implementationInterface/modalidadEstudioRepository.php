<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\modalidad_estudio;
use App\Modules\GradosyTitulos\Repository\interfaces\modalidadEstudioRepositoryInterface;

class modalidadEstudioRepository implements modalidadEstudioRepositoryInterface
{
    private $model;
    public function __construct(modalidad_estudio $model)
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
    public function listaModalidadEstudioYAlumnoBachiller(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("estado", "=", 1)->get();

    }
}

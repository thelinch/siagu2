<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\obtenciongrado;
use App\Modules\GradosyTitulos\Repository\interfaces\obtencionGradoRepositoryInterface;

class obtencionGradoRepository implements obtencionGradoRepositoryInterface
{
    private $model;
    public function __construct(obtenciongrado $model)
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
    public function listaObtencionGradoYAlumnoBachiller(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("estado", "=", 1)->get();

    }
}

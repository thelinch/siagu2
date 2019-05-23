<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\denominacionGradoTitulo;
use App\Modules\GradosyTitulos\Repository\interfaces\denominacionGradoRepositoryInterface;

class denominacionGradoRepository implements denominacionGradoRepositoryInterface
{
    private $model;
    public function __construct(denominacionGradoTitulo $model)
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
    public function listaDenominacionPorEscuelaProfesionalYAlumnoBachiller(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("escuela_profesional_id", "=", $cuerpoPeticion["id"])->where("grado_titulo_id", 1)->with(["gradoTitulo"])->get();
    }
}

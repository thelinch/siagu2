<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\empresa;
use App\Modules\GradosyTitulos\Repository\interfaces\empresaRepositoryInterface;

class empresaRepository implements empresaRepositoryInterface
{
    private $model;
    public function __construct(empresa $model)
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
    public function listaEmpresaYAlumnoBachiller(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("estado", "=", 1)->where("nombre", "=", "Universidad Nacional Agraria de la Selva")->where("tipo_empresa_id","=",$cuerpoPeticion["empresa_id"])->get();

    }
}

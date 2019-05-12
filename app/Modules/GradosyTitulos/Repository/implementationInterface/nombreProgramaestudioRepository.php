<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;

use Illuminate\Http\Request;
use App\Modules\GradosyTitulos\Repository\Models\nombreProgramaestudio;
use App\Modules\GradosyTitulos\Repository\interfaces\nombreProgramaestudioRepositoryInterface;

class nombreProgramaestudioRepository implements nombreProgramaestudioRepositoryInterface
{
    private $model;
    public function __construct(nombreProgramaestudio $model)
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
    public function listaNombreprogramaEstudioYAlumnoBachiller(Request $request)
    {
        $cuerpoPeticion = $request->json()->all();
        return $this->model->where("estado", "=", 1)->get();

    }
}

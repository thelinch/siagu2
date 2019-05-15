<?php
namespace App\Modules\GradosyTitulos\Repository\implementationInterface;
use App\Modules\BienestarUniversitario\Repository\Models\AlumnoExternoPosgrado;
use Illuminate\Http\Request;

class alumnoExternoRepository implements AlumnoExternoRespositoryInterface{
    private $model;
    public function __construct(AlumnoExternoPosgrado $alumnoExternoPosgrado)
    {
        $this->model = $alumnoExternoPosgrado;
    }
    public function all()
    {
    }
    public function find($id)
    {
    }
    public function delete($id)
    {
       
    }
    public function create(Request $data)
    {
        
    }
    public function edit($id,array $data){

    }
    public function filtrarAlumnoExternoPorDocumentoIdentidad(Request $filtrado){
        $json=$filtrado->json()->all();
        return $this->model->where("estado",1)->persona()->where("numero_documento","=",$json["numero_documento"])->first();
    }

}
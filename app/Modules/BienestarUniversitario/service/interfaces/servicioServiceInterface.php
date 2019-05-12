<?php
namespace App\Modules\BienestarUniversitario\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface servicioServiceInterface extends crudService
{
    public function activarServicio(Request $request);
    public function requisitosPorIdServicio(Request $request);
    public function todososAlumnosPorIdServicio(Request $request);
    public function serviciosActivados();
    public function requisitosPorArrayServicio(Request $arrayServicio);
    //public function registroServiciosPorAlumno(Request $request);
    public function listaServiciosPorAlumno(Request $request);
}

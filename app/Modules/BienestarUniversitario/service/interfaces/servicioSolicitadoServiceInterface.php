<?php
namespace App\Modules\BienestarUniversitario\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface servicioSolicitadoServiceInterface extends crudService
{

    public function  listaServicioSolicitadoPorSemestreActual(Request $request);
    public function registroServicioSolicitadoPorAlumno(Request $request);
    public function servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual(Request $request);
}

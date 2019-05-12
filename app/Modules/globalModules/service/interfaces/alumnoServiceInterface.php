<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface alumnoServiceInterface extends crudService
{
    public function listaAlumnosPregrado();
    public function buscarAlumnoConRequisitosYServiciosPorId(Request $request);
    public function listaServiciosPorAlumno(Request $request);
    public function listarRequisitosPorAlumnoYSemestreActual(Request $request);
}

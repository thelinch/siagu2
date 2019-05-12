<?php
namespace App\Modules\BienestarUniversitario\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface alumnoRequisitoServiceInterface extends crudService
{
    public function listaArchivoPorAlumnoRequisito(Request $request);
    public function listaAlumnoRequisitoPorAlumnoYSemestre(Request $request);
    public function historialDeEstadosPorArchivo(Request $request);
    }

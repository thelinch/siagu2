<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;

interface alumnoRequisitoRepositoryInterface extends crudRepository
{
    public function listaArchivoPorAlumnoRequisito(Request $request);
    public function listaAlumnoRequisitoPorAlumnoYSemestre(Request $request);
    public function historialDeEstadosPorArchivo(Request $request);
}

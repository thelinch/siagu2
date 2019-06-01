<?php
namespace App\Modules\globalModules\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface alumnoRepositoryInterface extends crudRepository
{
    public function listaAlumnosPregrado();
    public function buscarAlumnoConRequisitosYServiciosPorId(Request $request);
    public function listaServiciosPorAlumno(Request $request);
    public function listaRequisitoPorAlumnoYCodigoMatricula(Request $request);
    public function listarRequisitosPorAlumnoYSemestreActual(Request $request);
    public function modificarElGradoPorAlumno(int $idAlumno);
    public function buscarAlumnoPorIdConTipoAlumno(int $idAlumno);
}

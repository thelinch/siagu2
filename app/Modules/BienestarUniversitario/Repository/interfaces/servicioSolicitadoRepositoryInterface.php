<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;

interface servicioSolicitadoRepositoryInterface extends crudRepository
{
    public function listaServicioSolicitadoPorSemestreActual(Request $request);
    public function registroServicioSolicitadoPorAlumno(Request $request);
    public function listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual(int $idAlumno, string $codigoMatricula);
    public function listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(int $idAlumno);
}

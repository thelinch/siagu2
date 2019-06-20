<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;

interface servicioSolicitadoRepositoryInterface extends crudRepository
{
    public function listaServicioSolicitadoPorSemestreActual(string $semestreActual);
    public function registroServicioSolicitadoPorAlumno(Request $request,string $codigoMatricula);
    public function listarRequisitosRegistradosComedorYInternadoPorAlumnoYSemestreActual(int $idAlumno, string $codigoMatricula);
    public function listaRequisitosRegistradoDelServicioSolicitadoMasActualPorAlumno(int $idAlumno);
    public function servicioSolicitadoPorAlumnoComedorYInternadoYSemestreActual(int $idAlumno, string $codigoMatricula);
    public function crearServicioSolicitadoRequisitoPorServicioSolicitado(int $idServicioSolicitado, string $codigoMatricula, int $idRequisito);
}

<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface ServicioRepositoryInterface extends crudRepository
{
    public function activarServicio(Request $request);
    public function requisitosPorIdServicio(Request $reques);
    public function todososAlumnosPorIdServicio(Request $request);
    public function serviciosActivados();
    public function listarRequisitosPorListaDeServicio(array $arrayServicio);
    //public function registroServiciosPorAlumno(Request $request);
    public function listaServiciosPorAlumno(Request $request);
    public  function servicioConAmpliaciones(int $id);
    public function edicioTotalNumeroVaronesMujeresPorServicio(Request $request);
    public function listarRequisitosActualizadosPorListaDeServicio(array $listaServiciosSolicitados);
    public function reiniciarServicioYActualizarCicloAcademico(int $id, string $codigoMatriculaSeleccionado, int $idCicloAcademico);
}

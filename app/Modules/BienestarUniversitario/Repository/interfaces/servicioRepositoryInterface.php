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
    public function requisitosPorArrayServicio(Request $arrayServicio);
    //public function registroServiciosPorAlumno(Request $request);
    public function listaServiciosPorAlumno(Request $request);
    public  function servicioConAmpliaciones(int $id);
}

<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\service\interfaces\servicioServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioRepositoryInterface;
use Illuminate\Http\Request;


class servicioService implements servicioServiceInterface
{
    private $repositoy;
    public function __construct(servicioRepositoryInterface $repositoryServicio)
    {
        $this->repositoy = $repositoryServicio;
    }
    public function all()
    {
        return $this->repositoy->all();
    }
    public function find($id)
    {
        return $this->repositoy->find($id);
    }
    public function delete($id)
    {
        return $this->repositoy->delete($id);
    }
    public function create(Request $data)
    {
        return $this->repositoy->create($data);
    }
    public function edit($id, array $data)
    {
        return $this->repositoy->edit($id, $data);
    }
    public function activarServicio(Request $request)
    {
        return $this->repositoy->activarServicio($request);
    }
    public function requisitosPorIdServicio(Request $request)
    {
        return $this->repositoy->requisitosPorIdServicio($request);
    }
    public function todososAlumnosPorIdServicio(Request $request)
    {
        return $this->repositoy->todososAlumnosPorIdServicio($request);
    }
    public function serviciosActivados()
    {
        return $this->repositoy->serviciosActivados();
    }
    public function requisitosPorArrayServicio(Request $arrayServicio)
    {
        return $this->repositoy->requisitosPorArrayServicio($arrayServicio);
    }
    /*public function registroServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->registroServiciosPorAlumno($request);
    }*/
    public function listaServiciosPorAlumno(Request $request)
    {
        return $this->repositoy->listaServiciosPorAlumno($request);
    }
}

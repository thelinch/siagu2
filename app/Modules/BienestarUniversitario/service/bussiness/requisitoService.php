<?php
namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\service\interfaces\requisitoServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\RequisitoRepositoryInterface;
use Illuminate\Http\Request;


class requisitoService implements requisitoServiceInterface
{
    private $requisitoRepository;
    public function __construct(RequisitoRepositoryInterface $repositorio)
    {

        $this->requisitoRepository = $repositorio;
    }
    public function all()
    {
        return $this->requisitoRepository->all();
    }

    public function find($id)
    {
        return $this->requisitoRepository->find($id);
    }
    public function delete($id)
    {
        return  $this->requisitoRepository->delete($id);
    }
    public function create(Request $data)
    {
        return $this->requisitoRepository->create($data);
    }
    public function  edit($id, array $data)
    {
        return $this->requisitoRepository->edit($id, $data);
    }
    public function updateServicio(Request $request)
    {
        return  $this->requisitoRepository->updateServicio($request);
    }
    public function updateTipo(Request $request)
    {
        return $this->requisitoRepository->updateTipo($request);
    }
    public function getArchivosPorRequisitoId(Request $request)
    {
        return $this->requisitoRepository->getArchivosPorRequisitoId($request);
    }
    public function cambiarActualizacion(Request $request)
    {
        return $this->requisitoRepository->cambiarActualizacion($request);
    }
    public function listarArchivosPorServicio(Request $request)
    {
        return $this->requisitoRepository->listarArchivosPorServicio($request);
    }
}

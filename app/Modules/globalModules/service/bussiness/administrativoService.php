<?php
namespace App\Modules\globalModules\service\bussiness;

use App\Modules\globalModules\service\interfaces\administrativoServiceInterface;
use Illuminate\Http\Request;
use App\Modules\globalModules\Repository\Models\Docente;

class administrativoService implements administrativoServiceInterface
{
    private $repository;
    public function all()
    {

        return $this->repository->all();
    }
    public function find($id)
    {
        return $this->repository->find($id);
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function create(Request $data)
    {
        return $this->repository->create($data);
    }
    public function edit($id, array $data)
    {
        return $this->repository->edit($id, $data);
    }
    public function listaAdministrativos()
    {
        return Docente::with("Persona.tipo_documento")->where("estado", true)->get();
    }
}

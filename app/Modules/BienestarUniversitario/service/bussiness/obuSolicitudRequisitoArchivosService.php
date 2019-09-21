<?php

namespace App\Modules\BienestarUniversitario\service\bussiness;

use App\Modules\BienestarUniversitario\Repository\interfaces\obuSolicitudRequisitoArchivoRepositoryInterface;
use App\Modules\BienestarUniversitario\service\interfaces\obuSolicitudRequisitoArchivosServiceInterface;
use Illuminate\Http\Request;

class obuSolicitudRequisitoArchivosService implements obuSolicitudRequisitoArchivosServiceInterface
{
    private $repositorio;
    public function __construct(obuSolicitudRequisitoArchivoRepositoryInterface $repository)

    {
        $this->repositorio = $repository;
    }
    public function all()
    { }
    public function find($id)
    { }
    public function delete($id)
    { }
    public function create(Request $data)
    {
        return $this->repositorio->create($data);
    }
    public function edit($id, array $data)
    { }
}

<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;

interface ampliacionRepositoryInterface extends crudRepository
{
    public function  listarAmpliacionPorServicioId(Request $request);
}

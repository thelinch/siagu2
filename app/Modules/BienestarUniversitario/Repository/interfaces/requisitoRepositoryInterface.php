<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;
use Illuminate\Http\Request;




interface RequisitoRepositoryInterface extends crudRepository
{
    public function updateServicio(Request $request);
    public function updateTipo(Request $request);
    public function getArchivosPorRequisitoId(Request $request);
    public function cambiarActualizacion(Request $request);
    public function listarArchivosPorServicio(Request $request);
}

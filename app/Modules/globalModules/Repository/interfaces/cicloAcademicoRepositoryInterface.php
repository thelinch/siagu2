<?php
namespace App\Modules\globalModules\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface cicloAcademicoRepositoryInterface extends crudRepository
{
    public function modificarCicloAcademicoPorServicio(Request $request);
}

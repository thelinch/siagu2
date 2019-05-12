<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface empresaRepositoryInterface extends crudRepository
{
    public function listaEmpresaYAlumnoBachiller(Request $request);
}

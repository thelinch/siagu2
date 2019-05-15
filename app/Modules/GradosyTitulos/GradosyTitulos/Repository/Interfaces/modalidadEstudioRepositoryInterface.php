<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface modalidadEstudioRepositoryInterface extends crudRepository
{
    public function listaModalidadEstudioYAlumnoBachiller(Request $request);
}

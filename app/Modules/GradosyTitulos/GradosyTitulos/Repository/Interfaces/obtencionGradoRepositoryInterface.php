<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface obtencionGradoRepositoryInterface extends crudRepository
{
    public function listaObtencionGradoYAlumnoBachiller(Request $request);
}

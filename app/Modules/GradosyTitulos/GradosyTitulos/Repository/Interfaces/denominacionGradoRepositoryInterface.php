<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface denominacionGradoRepositoryInterface extends crudRepository
{
    public function listaDenominacionPorEscuelaProfesionalYAlumnoBachiller(Request $filtrado);
}

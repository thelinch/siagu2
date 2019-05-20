<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface tipoDiplomaRepositoryInterface extends crudRepository
{
    public function listaTipoDiploma(Request $request);
}

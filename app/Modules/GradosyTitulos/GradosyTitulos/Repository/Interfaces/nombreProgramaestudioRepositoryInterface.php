<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface nombreProgramaestudioRepositoryInterface extends crudRepository
{
    public function listaNombreprogramaEstudioYAlumnoBachiller(Request $request);
}

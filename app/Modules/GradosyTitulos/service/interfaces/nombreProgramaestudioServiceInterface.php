<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface nombreProgramaestudioServiceInterface extends crudService
{
    public function listaNombreprogramaEstudioYAlumnoBachiller(Request $filtrado);
}

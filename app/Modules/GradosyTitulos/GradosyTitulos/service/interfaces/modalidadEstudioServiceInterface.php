<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface modalidadEstudioServiceInterface extends crudService
{
    public function listaModalidadEstudioYAlumnoBachiller(Request $filtrado);
}

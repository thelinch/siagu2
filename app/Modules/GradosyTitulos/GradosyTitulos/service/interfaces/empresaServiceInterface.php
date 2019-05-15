<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface empresaServiceInterface extends crudService
{
    public function listaEmpresaYAlumnoBachiller(Request $filtrado);
}

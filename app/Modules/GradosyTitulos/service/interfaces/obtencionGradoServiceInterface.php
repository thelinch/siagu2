<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface obtencionGradoServiceInterface extends crudService
{
    public function listaObtencionGradoYAlumnoBachiller(Request $filtrado);
}

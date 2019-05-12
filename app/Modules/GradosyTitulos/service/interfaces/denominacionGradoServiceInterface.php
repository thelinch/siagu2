<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface denominacionGradoServiceInterface extends crudService
{
    public function listaDenominacionPorEscuelaProfesionalYAlumnoBachiller(Request $filtrado);
}

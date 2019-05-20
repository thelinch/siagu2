<?php
namespace App\Modules\GradosyTitulos\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;

interface tipoDiplomaServiceInterface extends crudService
{
    public function listaTipoDiploma(Request $filtrado);
}

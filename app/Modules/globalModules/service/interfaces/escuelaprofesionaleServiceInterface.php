<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface escuelaprofesionaleServiceInterface extends crudService
{
    public function listaEscuelasProfesionales();

}

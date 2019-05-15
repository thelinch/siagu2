<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface decanoFacultadServiceInterface extends crudService
{
    public function listaDecanoFacultades();

}

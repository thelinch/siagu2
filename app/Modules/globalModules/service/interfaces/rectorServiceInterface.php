<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface rectorServiceInterface extends crudService
{
    public function listaRectores();

}

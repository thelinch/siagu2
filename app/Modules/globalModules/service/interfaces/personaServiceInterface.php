<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface personaServiceInterface extends crudService
{
    public function listaPersonas();

}

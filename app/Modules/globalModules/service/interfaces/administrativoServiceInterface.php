<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface administrativoServiceInterface extends crudService
{
    public function listaAdministrativos();

}

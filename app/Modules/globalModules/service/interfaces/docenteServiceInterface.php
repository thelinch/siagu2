<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface docenteServiceInterface extends crudService
{
    public function listaDocentes();

}

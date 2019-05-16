<?php
namespace App\Modules\globalModules\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;


interface trabajadorAreaServiceInterface extends crudService
{
    public function listaTrabajadorAreas();

}

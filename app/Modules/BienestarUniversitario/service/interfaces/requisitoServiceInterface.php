<?php
namespace App\Modules\BienestarUniversitario\service\interfaces;

use App\Modules\globalModules\interfaces\service\crudService;
use Illuminate\Http\Request;


interface requisitoServiceInterface extends crudService
{
    public function updateTipo(Request $request);
    public function updateServicio(Request $request);
    public function getArchivosPorRequisitoId(Request $request);
    }

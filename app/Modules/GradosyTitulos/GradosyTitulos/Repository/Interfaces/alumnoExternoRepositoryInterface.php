<?php
namespace App\Modules\GradosyTitulos\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

use Illuminate\Http\Request;

interface AlumnoExternoRespositoryInterface extends crudRepository{
  public function filtrarAlumnoExternoPorDocumentoIdentidad(Request $filtrado);
}
<?php
namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use App\Modules\globalModules\interfaces\repository\crudRepository;

interface servicioSolicitadoRequisitoInterface extends crudRepository
{
    public function crearArchivoAlumnoRequisito(string $nombreOrigalArchivo, string $nombreSistema, string $url, string $extension, int $servicioRequisitoId);
}

<?php
namespace App\Modules\globalModules\Repository\interfaces;

interface fileRepositoryInterface
{
    function fileUploadRequisito($requisitoId, $nombreOriginalArchivo, $nombreSistemaArchivo, $url);
}

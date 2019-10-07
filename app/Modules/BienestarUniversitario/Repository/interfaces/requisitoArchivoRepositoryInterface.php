<?php

namespace App\Modules\BienestarUniversitario\Repository\interfaces;

use Illuminate\Http\Request;

interface requisitoArchivoRepositoryInterface
{
    public function create(Request $request);
    public function eliminar(int $id);
}

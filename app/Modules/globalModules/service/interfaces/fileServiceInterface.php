<?php
namespace App\Modules\globalModules\service\interfaces;

use Illuminate\Http\Request;

interface fileServiceInterface
{
    public  function fileUploadRequisito(Request $request);
}

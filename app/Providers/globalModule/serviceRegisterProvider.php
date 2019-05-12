<?php
namespace App\Providers\globalModule;

use Illuminate\Support\ServiceProvider;
use App\Modules\globalModules\service\bussiness\alumnoService;
use App\Modules\globalModules\service\interfaces\alumnoServiceInterface;
use App\Modules\globalModules\service\bussiness\fileService;
use App\Modules\globalModules\service\interfaces\fileServiceInterface;
use App\Modules\globalModules\Repository\implementationInterface\alumnoRepository;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;

class serviceRegisterProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind("alumnoService", function ($app) {
            return new alumnoService(
                $app->make(alumnoServiceInterface::class)
            );
        });
        $this->app->bind("fileService", function ($app) {
            return new fileService(
                $app->make(fileServiceInterface::class)
            );
        });
    }
}

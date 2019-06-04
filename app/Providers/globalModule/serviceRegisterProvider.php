<?php
namespace App\Providers\globalModule;

use Illuminate\Support\ServiceProvider;
use App\Modules\globalModules\service\bussiness\alumnoService;
use App\Modules\globalModules\service\interfaces\alumnoServiceInterface;
use App\Modules\globalModules\service\bussiness\fileService; 
use App\Modules\globalModules\service\bussiness\cicloAcademicoService;
use App\Modules\globalModules\service\interfaces\cicloAcademicoServiceInterface;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\servicioRepository;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\requisitoArchivoRepository;
use App\Modules\globalModules\Repository\implementationInterface\alumnoRepository;

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
                $app->make(requisitoArchivoRepository::class)
            );
        });
        $this->app->bind("cicloAcademicoService", function ($app) {
            return new cicloAcademicoService(
                $app->make(cicloAcademicoServiceInterface::class),
                $app->make(servicioRepository::class)
            );
        });
    }
}

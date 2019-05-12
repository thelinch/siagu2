<?php

namespace App\Providers\bienestarUniversitario;

use Illuminate\Support\ServiceProvider;
use App\Modules\BienestarUniversitario\service\bussiness\requisitoService;
use App\Modules\BienestarUniversitario\service\interfaces\requisitoServiceInterface;
use App\Modules\BienestarUniversitario\service\interfaces\servicioServiceInterface;
use App\Modules\BienestarUniversitario\service\interfaces\alumnoRequisitoServiceInterface;

use App\Modules\BienestarUniversitario\service\bussiness\servicioService;
use App\Modules\BienestarUniversitario\service\bussiness\alumnoRequisitoService;
use App\Modules\BienestarUniversitario\service\bussiness\servicioSolicitadoService;
use App\Modules\BienestarUniversitario\service\interfaces\servicioSolicitadoServiceInterface;

class serviceRegisterProvider extends ServiceProvider
{
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        /* $this->app->bind("alumnoService", function ($app) {
            return new alumnoService(
                $app->make(alumnoServiceInterface::class)
            );
        });*/
        $this->app->bind("requisitoService", function ($app) {
            return new requisitoService(
                $app->make(requisitoServiceInterface::class)
            );
        });
        $this->app->bind("servicioService", function ($app) {
            return  new servicioService(
                $app->make(servicioServiceInterface::class)
            );
        });
        $this->app->bind("alumnoRequisitoService", function ($app) {
            return  new alumnoRequisitoService(
                $app->make(alumnoRequisitoServiceInterface::class)
            );
        });
        $this->app->bind("servicioSolicitadoService", function ($app) {
            return  new servicioSolicitadoService(
                $app->make(servicioSolicitadoServiceInterface::class)
            );
        });
    }
}

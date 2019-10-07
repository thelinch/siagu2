<?php

namespace App\Providers\bienestarUniversitario;

use Illuminate\Support\ServiceProvider;
use App\Modules\BienestarUniversitario\service\bussiness\requisitoService;
use App\Modules\BienestarUniversitario\service\interfaces\requisitoServiceInterface;
use App\Modules\BienestarUniversitario\service\interfaces\servicioServiceInterface;
use App\Modules\BienestarUniversitario\service\interfaces\alumnoRequisitoServiceInterface;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\servicioRepository;
use App\Modules\BienestarUniversitario\service\bussiness\servicioService;
use App\Modules\BienestarUniversitario\service\bussiness\alumnoRequisitoService;
use App\Modules\BienestarUniversitario\service\bussiness\servicioSolicitadoService;
use App\Modules\BienestarUniversitario\service\interfaces\servicioSolicitadoServiceInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\ampliacionRepositoryInterface;
use App\Modules\BienestarUniversitario\service\bussiness\ampliacionService;
use App\Modules\BienestarUniversitario\service\interfaces\ampliacionServiceInterface;
use App\Modules\globalModules\Repository\implementationInterface\cicloAcademicoRepository;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\servicioSolicitadoRepository;
use App\Modules\BienestarUniversitario\service\bussiness\obuSolicitudRequisitoArchivosService;
use App\Modules\BienestarUniversitario\service\bussiness\requisitoArchivoService;
use App\Modules\BienestarUniversitario\service\interfaces\obuSolicitudRequisitoArchivosServiceInterface;
use App\Modules\BienestarUniversitario\service\interfaces\requisitoArchivoServiceInterface;
use App\Modules\globalModules\Repository\implementationInterface\alumnoRepository;

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
                $app->make(servicioServiceInterface::class),
                $app->make(cicloAcademicoRepository::class),
                $app->make(servicioSolicitadoRepository::class),
                $app->make(alumnoRepository::class)
            );
        });
        $this->app->bind("alumnoRequisitoService", function ($app) {
            return  new alumnoRequisitoService(
                $app->make(alumnoRequisitoServiceInterface::class)
            );
        });
        $this->app->bind("servicioSolicitadoService", function ($app) {
            return  new servicioSolicitadoService(
                $app->make(servicioSolicitadoServiceInterface::class),
                $app->make(cicloAcademicoRepository::class)
            );
        });
        $this->app->bind("ampliacionService", function ($app) {
            return new ampliacionService(
                $app->make(ampliacionServiceInterface::class),
                $app->make(servicioRepository::class)
            );
        });
        $this->app->bind("obuSolicitudRequisitoArchivosService", function ($app) {
            return new obuSolicitudRequisitoArchivosService(
                $app->make(obuSolicitudRequisitoArchivosServiceInterface::class)
            );
        });
        $this->app->bind("requisitoArchivoService", function ($app) {
            return new requisitoArchivoService(
                $app->make(requisitoArchivoServiceInterface::class)
            );
        });
    }
}

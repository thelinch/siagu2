<?php

namespace App\Providers\gradosYTitulos;

use Illuminate\Support\ServiceProvider;
use App\Modules\GradosyTitulos\service\bussines\denominacionGradoService;
use App\Modules\GradosyTitulos\service\interfaces\denominacionGradoServiceInterface;
use App\Modules\GradosyTitulos\service\bussiness\alumnoGraduadoTituladoService;
use App\Modules\GradosyTitulos\service\interfaces\alumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\service\interfaces\registroAlumnoGraduadoTituladoServiceInterface;
use App\Modules\GradosyTitulos\service\bussiness\registroAlumnoGraduadoTituladoService;
use App\Modules\globalModules\Repository\implementationInterface\alumnoRepository;
use App\Modules\GradosyTitulos\Repository\implementationInterface\alumnoGraduadoTituladoRepository;

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


        $this->app->bind("denominacionGradoService", function ($app) {
            return new denominacionGradoService(
                $app->make(denominacionGradoServiceInterface::class)
            );
        });
        $this->app->bind("alumnoGraduadoTituladoService", function ($app) {
            return new alumnoGraduadoTituladoService(
                $app->make(alumnoGraduadoTituladoServiceInterface::class)
            );
        });
        $this->app->bind("registroAlumnoGraduadoTituladoService", function ($app) {
            return new registroAlumnoGraduadoTituladoService(
                $app->make(registroAlumnoGraduadoTituladoServiceInterface::class),
                $app->make(alumnoRepository::class),
                $app->make(alumnoGraduadoTituladoRepository::class)
            );
        });
    }
}

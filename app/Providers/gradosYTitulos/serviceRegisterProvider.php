<?php

namespace App\Providers\gradosYTitulos;

use Illuminate\Support\ServiceProvider;
use App\Modules\GradosyTitulos\service\bussines\denominacionGradoService;
use App\Modules\GradosyTitulos\service\interfaces\denominacionGradoServiceInterface;
use App\Modules\GradosyTitulos\service\bussiness\alumnoGraduadoTituladoService;
use App\Modules\GradosyTitulos\service\interfaces\alumnoGraduadoTituladoServiceInterface;

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
    }
}

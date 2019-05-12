<?php
namespace App\Providers\bienestarUniversitario;

use Illuminate\Support\ServiceProvider;
use App\Modules\BienestarUniversitario\Repository\interfaces\RequisitoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\RequisitoRepository;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\alumnoRequisitoRepository;

use App\Modules\BienestarUniversitario\Repository\interfaces\ServicioRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\servicioRepository;
use App\Modules\BienestarUniversitario\Repository\implementationInterface\servicioSolicitadoRepository;

use App\Modules\BienestarUniversitario\Repository\interfaces\alumnoRequisitoRepositoryInterface;
use App\Modules\BienestarUniversitario\Repository\interfaces\servicioSolicitadoRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = false;
    public function register()
    {
        $this->app->bind(
            ServicioRepositoryInterface::class,
            servicioRepository::class
        );
        /*$this->app->bind(
            PersonaRepositoryInterface::class,
            PersonaRepository::class
        );*/
        /*$this->app->bind(
            AlumnoRepositoryInterface::class,
            AlumnoRepository::class
        );*/
        $this->app->bind(
            RequisitoRepositoryInterface::class,
            RequisitoRepository::class
        );
        $this->app->bind(
            alumnoRequisitoRepositoryInterface::class,
            alumnoRequisitoRepository::class
        );
        $this->app->bind(
            servicioSolicitadoRepositoryInterface::class,
            servicioSolicitadoRepository::class
        );
        /**/
        /*$this->app->bind(
            alumnoServiceInterface::class,
            alumnoServiceInterfaceImplements::class
        );*/
    }
}

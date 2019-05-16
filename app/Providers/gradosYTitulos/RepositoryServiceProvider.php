<?php
namespace App\Providers\gradosYTitulos;

use Illuminate\Support\ServiceProvider;
use App\Modules\GradosyTitulos\Repository\interfaces\denominacionGradoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\denominacionGradoRepository;


use App\Modules\GradosyTitulos\Repository\interfaces\nombreProgramaestudioRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\nombreProgramaestudioRepository;

use App\Modules\GradosyTitulos\Repository\interfaces\modalidadEstudioRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\modalidadEstudioRepository;

use App\Modules\GradosyTitulos\Repository\interfaces\obtencionGradoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\obtencionGradoRepository;

use App\Modules\GradosyTitulos\Repository\interfaces\empresaRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\empresaRepository;

use App\Modules\GradosyTitulos\Repository\interfaces\alumnoGraduadoTituladoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\alumnoGraduadoTituladoRepository;

use App\Modules\GradosyTitulos\Repository\interfaces\registroAlumnoGraduadoTituladoRepositoryInterface;
use App\Modules\GradosyTitulos\Repository\implementationInterface\registroAlumnoGraduadoTituladoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = false;
    public function register()
    {

        $this->app->bind(
            denominacionGradoRepositoryInterface::class,
            denominacionGradoRepository::class
        );

        $this->app->bind(
            nombreProgramaestudioRepositoryInterface::class,
            nombreProgramaestudioRepository::class
        );

        $this->app->bind(
            modalidadEstudioRepositoryInterface::class,
            modalidadEstudioRepository::class
        );

        $this->app->bind(
            obtencionGradoRepositoryInterface::class,
            obtencionGradoRepository::class
        );

        $this->app->bind(
            empresaRepositoryInterface::class,
            empresaRepository::class
        );

        $this->app->bind(
            alumnoGraduadoTituladoRepositoryInterface::class,
            alumnoGraduadoTituladoRepository::class
        );

        $this->app->bind(
            registroAlumnoGraduadoTituladoRepositoryInterface::class,
            registroAlumnoGraduadoTituladoRepository::class
        );
    }
}

<?php
namespace App\Providers\globalModule;

use Illuminate\Support\ServiceProvider;
use App\Modules\globalModules\Repository\implementationInterface\alumnoRepository;
use App\Modules\globalModules\Repository\implementationInterface\fileRepository;
use App\Modules\globalModules\Repository\interfaces\alumnoRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\fileRepositoryInterface;
use App\Modules\globalModules\Repository\interfaces\cicloAcademicoRepositoryInterface;
use App\Modules\globalModules\Repository\implementationInterface\cicloAcademicoRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = false;
    public function register()
    {
        $this->app->bind(
            alumnoRepositoryInterface::class,
            alumnoRepository::class
        );
        $this->app->bind(
            fileRepositoryInterface::class,
            fileRepository::class
        );
        $this->app->bind(
            cicloAcademicoRepositoryInterface::class,
            cicloAcademicoRepository::class
        );
    }
}

<?php

namespace Levaral\Core;

use Levaral\Core\Commands\GenerateStructure;
use Levaral\Core\Commands\MakeActionCommand;
use Levaral\Core\Commands\ModelMakeCommand;
use Levaral\Core\Commands\ModelsCommand;
use Illuminate\Support\ServiceProvider;
use Levaral\Core\Commands\GenerateApiJsCommand;

class CoreServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'core');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/core'),
        ]);
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateApiJsCommand::class,
                ModelMakeCommand::class,
                ModelsCommand::class,
                GenerateStructure::class,
                MakeActionCommand::class
            ]);
        }
    }

    public function provides()
    {
        return ['core'];
    }
}
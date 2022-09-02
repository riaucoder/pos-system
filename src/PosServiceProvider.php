<?php

namespace Riaucoder\PosSystem;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PosServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function boot()
    {

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Command\InstallCommand::class,
        ]);


    }

    public function provides()
    {
        return [Command\InstallCommand::class];
    }

    public function register()
    {

    }
}

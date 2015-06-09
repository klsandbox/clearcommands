<?php

namespace Klsandbox\ClearCommands;

use Illuminate\Support\ServiceProvider;

class ClearCommandsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('command.klsandbox.clearcachedblade', function($app) {
            return new ClearCachedBlade();
        });
        $this->app->singleton('command.klsandbox.clearoldlog', function($app) {
            return new ClearOldLog();
        });
        
        $this->commands('command.klsandbox.clearcachedblade');
        $this->commands('command.klsandbox.clearoldlog');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [
            'command.klsandbox.clearcachedblade',
            'command.klsandbox.clearoldlog',
        ];
    }

}

<?php

namespace Abordage\HtmlCard;

use Abordage\HtmlCard\Console\CardCommand;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('abordage-html-card', __DIR__ . '/../dist/js/card.js');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([CardCommand::class]);
        }
    }
}

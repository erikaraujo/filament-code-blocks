<?php

namespace ErikAraujo\FilamentCodeBlocks;

use Illuminate\Support\ServiceProvider;

class FilamentCodeBlocksServiceProvider extends ServiceProvider
{
    public static string $name = 'filament-code-blocks';

    public function register()
    {
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                base_path() . '/vendor/tempest/highlight/src/Themes/Css' => public_path('css/tempest/highlight'),
            ], 'assets');
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-code-blocks');
    }
}

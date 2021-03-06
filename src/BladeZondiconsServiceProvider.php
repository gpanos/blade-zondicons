<?php

declare(strict_types=1);

namespace BladeUI\Zondicons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeZondiconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('zondicons', [
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => 'zondicon',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-zondicons'),
            ], 'blade-zondicons');
        }
    }
}

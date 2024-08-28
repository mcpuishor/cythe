<?php
namespace Mcpuishor\Cythe;

use Illuminate\Support\ServiceProvider;

class CytheServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'cythe');
    }

    public function register()
    {

    }
}

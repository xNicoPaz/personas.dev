<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CreatePersonViewComposer;
use App\Http\ViewComposers\IndexPersonViewComposer;
use Illuminate\Support\Facades\View;

class ViewComposersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('personas.create', CreatePersonViewComposer::class);

        View::composer('personas.index', IndexPersonViewComposer::class);

        View::composer('localidades.index', IndexTownViewComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

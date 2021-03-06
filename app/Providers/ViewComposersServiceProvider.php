<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\CreatePersonViewComposer;
use App\Http\ViewComposers\IndexPersonViewComposer;
use App\Http\ViewComposers\IndexTownViewComposer;
use App\Http\ViewComposers\IndexProvinceViewComposer;
use App\Http\ViewComposers\IndexCountryViewComposer;
use App\Http\ViewComposers\CreateTownViewComposer;
use App\Http\ViewComposers\CreateProvinceViewComposer;
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
    
        View::composer('provincias.index', IndexProvinceViewComposer::class);

        View::composer('paises.index', IndexCountryViewComposer::class);
    
        View::composer('localidades.create', CreateTownViewComposer::class);

        View::composer('provincias.create', CreateProvinceViewComposer::class);
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

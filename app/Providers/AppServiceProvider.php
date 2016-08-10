<?php

namespace CockstarGays\Providers;

use CockstarGays\Models\User;
use Illuminate\Support\ServiceProvider;
use CockstarGays\Http\Requests\Request;
use CockstarGays\Http\Controllers\CrudController;
use CockstarGays\Contracts\CrudInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

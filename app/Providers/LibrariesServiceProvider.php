<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LibrariesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    require_once app_path() . '/Libraries/Applib.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

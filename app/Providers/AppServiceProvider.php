<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Event\EventInterface;
use App\Repositories\Event\EventRepository;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(EventInterface::class, EventRepository::class);
    }
}

<?php

namespace App\Providers;

use App\Repositories\{PublicadorRepositoryInterface, PublicadorEloquentORM};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PublicadorRepositoryInterface::class, 
            PublicadorEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

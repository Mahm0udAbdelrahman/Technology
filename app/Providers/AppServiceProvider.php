<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\TrendingInterface;
use App\Interface\UserGuideInterface;
use App\Repositories\TraningRepository;
use App\Repositories\UserGuideRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TrendingInterface::class, TraningRepository::class);
        $this->app->bind(UserGuideInterface::class, UserGuideRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Interface\FAQInterface;
use App\Interface\TableInterface;
use App\Repositories\FAQRepository;
use App\Interface\RealTimeInterface;
use App\Interface\TrendingInterface;
use App\Interface\UserGuideInterface;
use App\Repositories\TableRepository;
use App\Repositories\TraningRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RealTimeRepository;
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
        $this->app->bind(RealTimeInterface::class, RealTimeRepository::class);
        $this->app->bind(FAQInterface::class, FAQRepository::class);
        $this->app->bind(TableInterface::class, TableRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

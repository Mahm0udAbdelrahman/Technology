<?php

namespace App\Providers;

use App\Interface\FAQInterface;
use App\Interface\ChartInterface;
use App\Interface\TableInterface;
use App\Interface\ContactInterface;
use App\Repositories\FAQRepository;
use App\Interface\RealTimeInterface;
use App\Interface\TrendingInterface;
use App\Interface\TutorialInterface;
use App\Interface\UserGuideInterface;
use App\Repositories\ChartRepository;
use App\Repositories\TableRepository;
use App\Interface\TechnologyInterface;
use App\Interface\DataInsightInterface;
use App\Repositories\ContactRepository;
use Illuminate\Support\ServiceProvider;
use App\Interface\DataMangmentInterface;
use App\Repositories\RealTimeRepository;
use App\Repositories\TrendingRepository;
use App\Repositories\TutorialRepository;
use App\Repositories\UserGuideRepository;
use App\Repositories\TechnologyRepository;
use App\Repositories\DataInsightRepository;
use App\Repositories\DataMangmentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TrendingInterface::class, TrendingRepository::class);
        $this->app->bind(UserGuideInterface::class, UserGuideRepository::class);
        $this->app->bind(RealTimeInterface::class, RealTimeRepository::class);
        $this->app->bind(FAQInterface::class, FAQRepository::class);
        $this->app->bind(TableInterface::class, TableRepository::class);
        $this->app->bind(TutorialInterface::class, TutorialRepository::class);
        $this->app->bind(ContactInterface::class, ContactRepository::class);
        $this->app->bind(ChartInterface::class, ChartRepository::class);
        $this->app->bind(DataInsightInterface::class, DataInsightRepository::class);
        $this->app->bind(TechnologyInterface::class, TechnologyRepository::class);
 

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

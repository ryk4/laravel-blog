<?php

namespace App\Providers;

use App\Interfaces\BlogInterface;
use App\Interfaces\JobInterface;
use App\Interfaces\SubscriptionInterface;
use App\Interfaces\TagInterface;
use App\Repositories\BlogRepository;
use App\Repositories\JobRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BlogInterface::class, BlogRepository::class);
        $this->app->bind(JobInterface::class, JobRepository::class);
        $this->app->bind(SubscriptionInterface::class, SubscriptionRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
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

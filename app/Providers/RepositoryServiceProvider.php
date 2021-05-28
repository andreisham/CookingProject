<?php

namespace App\Providers;

use App\Repositories\MealsRepository\MealsRepository;
use App\Repositories\MealsRepository\MealsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(MealsRepositoryInterface::class, MealsRepository::class);
    }
}

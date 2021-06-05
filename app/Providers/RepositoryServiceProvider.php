<?php

namespace App\Providers;

use App\Repositories\FavoritesRepository\FavoritesRepository;
use App\Repositories\FavoritesRepository\FavoritesRepositoryInterface;
use App\Repositories\IngredientsRepository\IngredientsRepository;
use App\Repositories\IngredientsRepository\IngredientsRepositoryInterface;
use App\Repositories\MealsRepository\MealsRepository;
use App\Repositories\MealsRepository\MealsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            MealsRepositoryInterface::class,
            MealsRepository::class
        );

        $this->app->bind(
            IngredientsRepositoryInterface::class,
            IngredientsRepository::class
        );

        $this->app->bind(
          FavoritesRepositoryInterface::class,
          FavoritesRepository::class,
        );
    }
}

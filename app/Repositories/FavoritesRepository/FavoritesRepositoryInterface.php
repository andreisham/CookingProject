<?php

namespace App\Repositories\FavoritesRepository;

interface FavoritesRepositoryInterface
{
    public function getByUserId(int $userId): array;
    public function add(int $mealId, int $userId): bool;
    public function remove(int $mealId, int $userId): bool;
}

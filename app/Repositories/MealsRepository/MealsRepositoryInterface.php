<?php

namespace App\Repositories\MealsRepository;

interface MealsRepositoryInterface
{
    public function getAll(): array;
    public function getByIngredients(array $idx): array;
    public function getByIngredientId(int $id): array;
    public function getRandom(): array;
}

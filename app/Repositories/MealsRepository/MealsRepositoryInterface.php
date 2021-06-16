<?php

namespace App\Repositories\MealsRepository;

interface MealsRepositoryInterface
{
    public function getAll(): array;
    public function getList(): array;
    public function getById(int $mealId): array;
    public function getByIngredients(array $idx): array;
    public function getByIngredientId(int $id): array;
    public function getCountByIngredients(array $idxs): int;
    public function getRandom(): array;
}

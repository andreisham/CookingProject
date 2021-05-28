<?php

namespace App\Repositories\IngredientsRepository;

use App\Models\Ingredient;

class IngredientsRepository implements IngredientsRepositoryInterface
{
    public function getAll(): array
    {
        return Ingredient::get()->toArray();
    }
}

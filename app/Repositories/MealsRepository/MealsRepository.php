<?php

namespace App\Repositories\MealsRepository;

use App\Models\Meal;
use Illuminate\Support\Facades\DB;

class MealsRepository implements MealsRepositoryInterface
{
    public function getAll(): array
    {
        return Meal::get()->toArray();
    }

    public function getByIngredientId(int $id): array
    {
        $meals = DB::table('meals_ingredients as mi')
            ->select(
                'm.id as id',
                'm.name as name',
                'm.instruction',
                'm.components_measure',
                'm.api_img',
                'm.youtube'
            )
            ->join('meals as m', 'm.id', '=', 'mi.meal_id')
            ->where('mi.ingredient_id', '=', $id)
            ->get();
        return $meals->toArray();
    }
}

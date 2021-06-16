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

    public function getList(): array
    {
        return Meal::select('id', 'name')
            ->get()
            ->toArray();
    }

    public function getById(int $mealId): array
    {
        return Meal::find($mealId)->toArray();
    }

    public function getByIngredientId(int $id): array
    {
        $meals = DB::table('ingredient_meal as im')
            ->select(
                'm.id as id',
                'm.name as name',
                'm.instruction',
                'm.components_measure',
                'm.api_img',
                'm.youtube'
            )
            ->join('meals as m', 'm.id', '=', 'im.meal_id')
            ->where('im.ingredient_id', '=', $id)
            ->get();
        return $meals->toArray();
    }

    public function getByIngredients(array $idxs): array
    {
        $query = DB::table('meals as m');
        foreach ($idxs as $k => $id) {
            $query = $query->join("ingredient_meal as im$k", function ($join) use ($k, $id) {
                $join->on("im$k.meal_id", '=', 'm.id')
                    ->where("im$k.ingredient_id", '=', $id);
            });
        }
        return $query->get()->toArray();
    }

    public function getCountByIngredients(array $idxs): int
    {
        return count($this->getByIngredients($idxs));
    }

    public function getRandom(): array
    {
        $mealsIds = Meal::select('id')
            ->get()
            ->toArray();
        $mealId = $mealsIds[mt_rand(0, count($mealsIds))];

        return Meal::find($mealId)
            ->toArray();
    }
}

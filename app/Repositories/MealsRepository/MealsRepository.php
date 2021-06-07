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
//        select m.* from meals m
//            join
//            (select im.meal_id
//            from ingredient_meal im
//            where im.ingredient_id in (1, 131)
//            GROUP BY im.meal_id
//            HAVING COUNT(im.ingredient_id) = 2) tbl on tbl.meal_id = m.id;

        $mealsIdxs = DB::table('ingredient_meal')
            ->select(
                'meal_id',
                DB::raw('count(ingredient_id) as cnt')
            )
            ->whereIn('ingredient_id', $idxs)
            ->groupBy('meal_id')
            ->having('cnt', '=', count($idxs));

        $meals = DB::table('meals as m')
            ->joinSub($mealsIdxs, 'im', function ($join) {
                $join->on('m.id', '=', 'im.meal_id');
            })->get();

        return $meals->toArray();
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

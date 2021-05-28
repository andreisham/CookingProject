<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealsIngredientsSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents(storage_path() . '/data/meals_ingredients.json');
        $meals_ingredients = json_decode($data, true, JSON_UNESCAPED_UNICODE);

        foreach ($meals_ingredients['data'] as $item) {
            DB::table('meals_ingredients')->insertOrIgnore([
                'meal_id' => $item['meal_id'],
                'ingredient_id' => $item['ingredient_id'],
            ]);
        }
    }
}

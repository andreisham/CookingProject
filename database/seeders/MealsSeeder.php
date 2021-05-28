<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealsSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents(storage_path() . '/data/meals.full.rus.json');
        $meals = json_decode($data, true, JSON_UNESCAPED_UNICODE);

        foreach ($meals['data'] as $item) {
            DB::table('meals')->insertOrIgnore([
                'id' => $item['id'],
                'name' => $item['name'],
                'instruction' => $item['instruction'],
                'components_measure' => json_encode($item['component_measure'], JSON_UNESCAPED_UNICODE),
                'api_img' => $item['api_img'] ?? '',
                'youtube' => $item['youtube'] ?? '',
            ]);
        }
    }
}

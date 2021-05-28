<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    public function run()
    {
        $data = file_get_contents(storage_path() . '/data/ingredients.rus.json');
        $ingredients = json_decode($data, true, JSON_UNESCAPED_UNICODE);

        foreach ($ingredients['data'] as $item) {
            DB::table('ingredients')->insertOrIgnore([
                'id' => $item['id'],
                'name' => $item['name'],
                'slack' => $item['slack'],
            ]);
        }
    }
}

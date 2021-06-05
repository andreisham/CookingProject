<?php

namespace App\Repositories\FavoritesRepository;

use Illuminate\Support\Facades\DB;

class FavoritesRepository implements FavoritesRepositoryInterface
{
    public function getByUserId(int $userId): array
    {
        $favorites = DB::table('favorites as f')
            ->select('m.id', 'm.name')
            ->join('meals as m', 'f.meal_id', '=', 'm.id')
            ->join('users as u','f.user_id', '=', 'u.id')
            ->where('u.id', '=', $userId)->get();
        return $favorites->toArray();
    }

    public function add(int $mealId, int $userId): bool
    {
        return DB::table('favorites')
            ->insert([
               'user_id' => $userId,
               'meal_id' => $mealId,
            ]);
    }

    public function remove(int $mealId, int $userId): bool
    {
        return (bool)DB::table('favorites')
            ->where('user_id', '=', $userId)
            ->where('meal_id', '=', $mealId)
            ->delete();
    }
}

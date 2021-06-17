<?php

namespace App\Http\Controllers;

use App\Http\Requests\Favorites\AddFavoriteRequest;
use App\Http\Requests\Favorites\DeleteFavoriteRequest;
use App\Repositories\FavoritesRepository\FavoritesRepositoryInterface;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    private FavoritesRepositoryInterface $favorites;

    public function __construct(FavoritesRepositoryInterface $favorites)
    {
        $this->favorites = $favorites;
    }

    public function get(Request $request)
    {
//        $userId = $request->user()->id;
        $userId = 1;
        $meals = $this->favorites->getByUserId($userId);
        return response()->json($meals);
    }

    public function add(AddFavoriteRequest $request)
    {
//        $userId = $request->user()->id ?? 1;
        $userId = 1;
        $mealId = $request->all()['meal_id'];
        $this->favorites->add($mealId, $userId);
    }

    public function delete(DeleteFavoriteRequest $request)
    {
//        $userId = $request->user()->id ?? 1;
        $userId = 1;
        $mealId = $request->all()['meal_id'];
        $this->favorites->remove($mealId, $userId);
    }
}

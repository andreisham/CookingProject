<?php

use App\Http\Controllers\FavoritesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IngredientController;
use \App\Http\Controllers\MealController;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ingredients', [IngredientController::class, 'index']);
Route::post('/ingredients', [IngredientController::class, 'store']);

Route::get('/meals', [MealController::class, 'index']);
Route::get('/meals/{id}', [MealController::class, 'show'])->where('id', '[0-9]+');
Route::get('/meals/list', [MealController::class, 'list']);
Route::get('/meals/count', [MealController::class, 'count']);
Route::get('/meal/random', [MealController::class, 'getRandom']);
Route::post('/meals', [MealController::class, 'store']);

Route::get('/favorites', [FavoritesController::class, 'get']);
Route::post('/favorites/meals/{id}', [FavoritesController::class, 'add']);
Route::delete('/favorites/meals/{id}', [FavoritesController::class, 'delete']);

Route::get('/authorized', [UserController::class, 'getAuthorizedUser']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

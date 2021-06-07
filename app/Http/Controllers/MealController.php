<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meals\GetMealByIdRequest;
use App\Models\Meal;
use App\Repositories\MealsRepository\MealsRepositoryInterface;
use Illuminate\Http\Request;

class MealController extends Controller
{
    private MealsRepositoryInterface $mealsRepository;

    public function __construct(MealsRepositoryInterface $mealsRepository)
    {
        $this->mealsRepository = $mealsRepository;
    }

    /**
     * @OA\Get(
     *      path="/meals",
     *      operationId="getMealsList",
     *      summary="Get list of meals",
     *      description="Returns list of meals",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     * @OA\Get(
     *      path="/meals?ingredient='string'",
     *      operationId="get3MealsList",
     *      summary="Get 3 meals",
     *      description="Returns list 3 of meals",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function index(Request $request)
    {
        $ingredients = $request->input('ingredient');
        if (!empty($ingredients)) {
            return response($this->mealsRepository->getByIngredients($ingredients));
        }
        return response($this->mealsRepository->getAll());
    }

    public function getRandom()
    {
        return response($this->mealsRepository->getRandom());
    }

    /**
     * @OA\Post(
     *      path="/meals",
     *      operationId="postMeal",
     *      summary="Store meal",
     *      description="Store meal",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/meals/{id}",
     *      operationId="getMeal",
     *      summary="Get meal",
     *      description="Returns meal",
     *     @OA\Parameter(
     *          name="id",
     *          description="Meal id",
     *          required=true,
     *          in="path",
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function show(GetMealByIdRequest $request)
    {
        $mealId = $request->all()['meal_id'];
        $meal = $this->mealsRepository->getById($mealId);
        return response()->json($meal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Meal $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Meal $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}

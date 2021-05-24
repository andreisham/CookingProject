<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
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
        $validator = Validator::make($request->only('ingredient'), [
            'ingredient' => 'string'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $ingredient = $request->only('ingredient');
        if (count($ingredient) > 0) {
            $meals = Meal::where('ingredient1', $ingredient)
                ->take(3)
                ->get();

            return response($meals, 200);
        }

        $meals = Meal::all();

        return response($meals, 200);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:45',
            'instructions' => 'required|string|min:100|max:1500',
            'image' => 'string',
            'ingredient1' => 'string|min:2|max:35',
            'ingredient2' => 'string|min:2|max:35',
            'ingredient3' => 'string|min:2|max:35',
            'ingredient4' => 'string|min:2|max:35',
            'ingredient5' => 'string|min:2|max:35',
            'ingredient6' => 'string|min:2|max:35',
            'ingredient7' => 'string|min:2|max:35',
            'ingredient8' => 'string|min:2|max:35',
            'ingredient9' => 'string|min:2|max:35',
            'ingredient10' => 'string|min:2|max:35',
            'ingredient11' => 'string|min:2|max:35',
            'ingredient12' => 'string|min:2|max:35',
            'ingredient13' => 'string|min:2|max:35',
            'ingredient14' => 'string|min:2|max:35',
            'ingredient15' => 'string|min:2|max:35',
            'ingredient16' => 'string|min:2|max:35',
            'ingredient17' => 'string|min:2|max:35',
            'ingredient18' => 'string|min:2|max:35',
            'ingredient19' => 'string|min:2|max:35',
            'ingredient20' => 'string|min:2|max:35',
            'measure1' => 'string|min:1|max:35',
            'measure2' => 'string|min:1|max:35',
            'measure3' => 'string|min:1|max:35',
            'measure4' => 'string|min:1|max:35',
            'measure5' => 'string|min:1|max:35',
            'measure6' => 'string|min:1|max:35',
            'measure7' => 'string|min:1|max:35',
            'measure8' => 'string|min:1|max:35',
            'measure9' => 'string|min:1|max:35',
            'measure10' => 'string|min:1|max:35',
            'measure11' => 'string|min:1|max:35',
            'measure12' => 'string|min:1|max:35',
            'measure13' => 'string|min:1|max:35',
            'measure14' => 'string|min:1|max:35',
            'measure15' => 'string|min:1|max:35',
            'measure16' => 'string|min:1|max:35',
            'measure17' => 'string|min:1|max:35',
            'measure18' => 'string|min:1|max:35',
            'measure19' => 'string|min:1|max:35',
            'measure20' => 'string|min:1|max:35'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $meal = new Meal();
        $meal->fill($request->all())->save();

        return response($meal, 200);
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
    public function show($id)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|integer']);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $meal = Meal::find($id)->first();

        return response($meal, 200);
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

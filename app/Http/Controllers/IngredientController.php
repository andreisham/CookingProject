<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    /**
     * @OA\Get(
     *      path="/ingredients",
     *      operationId="getIngredientsList",
     *      summary="Get list of ingredients",
     *      description="Returns list of ingredients",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        return response($ingredients, 200);
    }

    /**
     * @OA\Post(
     *      path="/ingredients",
     *      operationId="postIngredient",
     *      summary="Store ingredient",
     *      description="Store ingredient",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('title', 'description'), [
            'title' => 'required|string|min:2|max:25',
            'description' => 'required|string|min:100|max:1500',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $ingredient = new Ingredient();
        $ingredient->fill($request->only('title', 'description'))->save();

        return response($ingredient, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
    }
}

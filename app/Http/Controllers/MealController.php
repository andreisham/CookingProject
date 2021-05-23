<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:25',
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
            'measure1' => 'string|min:2|max:35',
            'measure2' => 'string|min:2|max:35',
            'measure3' => 'string|min:2|max:35',
            'measure4' => 'string|min:2|max:35',
            'measure5' => 'string|min:2|max:35',
            'measure6' => 'string|min:2|max:35',
            'measure7' => 'string|min:2|max:35',
            'measure8' => 'string|min:2|max:35',
            'measure9' => 'string|min:2|max:35',
            'measure10' => 'string|min:2|max:35',
            'measure11' => 'string|min:2|max:35',
            'measure12' => 'string|min:2|max:35',
            'measure13' => 'string|min:2|max:35',
            'measure14' => 'string|min:2|max:35',
            'measure15' => 'string|min:2|max:35',
            'measure16' => 'string|min:2|max:35',
            'measure17' => 'string|min:2|max:35',
            'measure18' => 'string|min:2|max:35',
            'measure19' => 'string|min:2|max:35',
            'measure20' => 'string|min:2|max:35'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $meal = new Meal();
        $meal->fill($request->all())->save();

        return response($meal, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMealsIngredientsTable extends Migration
{
    public function up()
    {
        Schema::rename('meals_ingredients', 'ingredient_meal');
    }

    public function down()
    {
        Schema::rename('ingredient_meal', 'meals_ingredients');
    }
}

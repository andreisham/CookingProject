<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('meals_ingredients', function (Blueprint $table) {
            $table->bigInteger('meal_id')->unsigned()->nullable(false);
            $table->bigInteger('ingredient_id')->unsigned()->nullable(false);
            $table->primary(['meal_id', 'ingredient_id']);
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals_ingredients');
    }
}

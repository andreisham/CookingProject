<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->bigInteger('meal_id')->unsigned()->nullable(false);
            $table->timestamps();
            $table->primary(['user_id', 'meal_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('meal_id')->references('id')->on('meals');
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}

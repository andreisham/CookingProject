<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('instructions');
            $table->string('image');
            $table->string('ingredient1');
            $table->string('ingredient2');
            $table->string('ingredient3');
            $table->string('ingredient4');
            $table->string('ingredient5');
            $table->string('ingredient6');
            $table->string('ingredient7');
            $table->string('ingredient8');
            $table->string('ingredient9');
            $table->string('ingredient10');
            $table->string('ingredient11');
            $table->string('ingredient12');
            $table->string('ingredient13');
            $table->string('ingredient14');
            $table->string('ingredient15');
            $table->string('ingredient16');
            $table->string('ingredient17');
            $table->string('ingredient18');
            $table->string('ingredient19');
            $table->string('ingredient20');
            $table->string('measure1');
            $table->string('measure2');
            $table->string('measure3');
            $table->string('measure4');
            $table->string('measure5');
            $table->string('measure6');
            $table->string('measure7');
            $table->string('measure8');
            $table->string('measure9');
            $table->string('measure10');
            $table->string('measure11');
            $table->string('measure12');
            $table->string('measure13');
            $table->string('measure14');
            $table->string('measure15');
            $table->string('measure16');
            $table->string('measure17');
            $table->string('measure18');
            $table->string('measure19');
            $table->string('measure20');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}

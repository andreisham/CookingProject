<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function meals() {
        return $this->hasMany(Meal::class);
    }
}

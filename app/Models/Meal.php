<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'instruction', 'components_measure', 'api_img', 'youtube',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}

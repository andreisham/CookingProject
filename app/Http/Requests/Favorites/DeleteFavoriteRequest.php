<?php

namespace App\Http\Requests\Favorites;

use Illuminate\Foundation\Http\FormRequest;

class DeleteFavoriteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meal_id' => 'required|integer|exists:favorites,meal_id',
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['meal_id'] = $this->route('id');
        return $data;
    }
}

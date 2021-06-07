<?php

namespace App\Http\Requests\Meals;

use Illuminate\Foundation\Http\FormRequest;

class GetMealByIdRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meal_id' => 'required|integer|exists:meals,id',
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['meal_id'] = $this->route('id');
        return $data;
    }
}

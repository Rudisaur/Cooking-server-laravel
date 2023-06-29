<?php

namespace App\Http\Requests\Ingredient;

use App\Http\Requests\RootRequest;

class IngredientUpdateRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:255',
                'min:1',
                'string',
            ],
            'image' => [
                'file'
            ],
            'description'=>[
                'string',
                'nullable'
            ]
        ];
    }
}

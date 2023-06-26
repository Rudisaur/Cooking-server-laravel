<?php

namespace App\Http\Requests\Ingredient;

use App\Http\Requests\RootRequest;

class IngredientListRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
                'string',
            ],
        ];
    }
}
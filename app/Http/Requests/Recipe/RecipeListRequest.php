<?php

namespace App\Http\Requests\Recipe;

use App\Http\Requests\RootRequest;

class RecipeListRequest extends RootRequest
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

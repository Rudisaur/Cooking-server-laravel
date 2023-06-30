<?php

namespace App\Http\Requests\Recipe;

use App\Http\Requests\RootRequest;
use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                'min:1',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'image' => [
                'file',
            ],
            'ingredients' => [
                'array'
            ],
        ];
    }
}


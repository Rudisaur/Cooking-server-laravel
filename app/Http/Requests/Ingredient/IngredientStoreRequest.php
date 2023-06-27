<?php

namespace App\Http\Requests\ingredient;

use App\Http\Requests\RootRequest;

class IngredientStoreRequest extends RootRequest
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
                'required',
                'file'
            ],
            'description'=>[
                'string',
                'nullable'
            ]
        ];
    }
}

<?php

namespace App\Http\Requests\Recipe;

use App\Http\Requests\RootRequest;

class RecipeUpdateRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'User_id'=>[
                'string'
            ],
            'name'=>[
                'string',
                'max:100',
                'min:1',
            ],
            'description'=>[
                'string',
            ],
            'image'=>[
                'file',
            ],
            'ingredients'=> 'array'
        ];
    }
}

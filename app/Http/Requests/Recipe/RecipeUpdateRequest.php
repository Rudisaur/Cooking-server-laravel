<?php

namespace App\Http\Requests\Recipe;

use App\Http\Requests\RootRequest;
use Illuminate\Foundation\Http\FormRequest;

class RecipeUpdateRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'User_id'=>[
                'required',
                'string'
            ],
            'name'=>[
                'required',
                'string',
                'max:100',
                'min:1',
            ],
            'description'=>[
                'nullable',
                'string',
            ],
            'image'=>[
                'file',
                'required'
            ]
        ];
    }
}

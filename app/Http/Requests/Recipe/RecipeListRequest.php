<?php

namespace App\Http\Requests\recipe;

use App\Http\Requests\RootRequest;
use Illuminate\Foundation\Http\FormRequest;

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

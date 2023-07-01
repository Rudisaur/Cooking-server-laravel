<?php

namespace App\Http\Requests\Restaurant;

use App\Http\Requests\RootRequest;

class RestaurantStoreRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'name'=>[
                'required',
                'string',
            ],
            'image'=>[
                'file'
            ],
        ];
    }
}

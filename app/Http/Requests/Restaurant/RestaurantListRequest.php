<?php

namespace App\Http\Requests\Restaurant;

use App\Http\Requests\RootRequest;
class RestaurantListRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'name'=>'string'
        ];
    }
}

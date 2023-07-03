<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\RootRequest;

class ReportStoreRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'description' => [
                'nullable',
                'string'
            ],
            'ingredients' =>
                [
                    'required',
                    'array',
                ],
            'restaurant_id' => [
                'required',
                'int'
            ],
            'date' => [
                'required',
                'int',
            ],
        ];
    }
}

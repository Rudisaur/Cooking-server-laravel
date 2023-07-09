<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\RootRequest;

class ReportListRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'restaurant_id' => [
                'required',
                'int',
            ],
            'description' => [
                'required',
                'string'
            ],
            'date' => [
                'nullable',
                'int'
            ],
        ];
    }
}

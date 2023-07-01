<?php

namespace App\Http\Requests\Report;

use App\Http\Requests\RootRequest;

class ReportListRequest extends RootRequest
{
    public function rules(): array
    {
        return [
            'description' => [
                'string'
            ],
            'date' => 'int'
        ];
    }
}

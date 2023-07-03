<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\RootRequest;

class RegisterRequest extends RootRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'unique:users'
            ],
            'password' => [
                'required',
                'min:8'
            ],
        ];
    }
}

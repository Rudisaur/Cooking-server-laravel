<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Http\Services\AuthService;

class AuthController extends Controller
{
    //
    public function register(AuthRequest $request, AuthService $authService)
    {
       $authService->createUser($request);
    }
}

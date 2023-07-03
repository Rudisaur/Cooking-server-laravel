<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\AuthService;
use App\Traits\HttpJsonResponse;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    use HttpJsonResponse;

    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        return $this->successJsonResponse(['accessToken' => $authService->createUser($request->validated())],'user.register.success');
    }

    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        $token = $authService->loginUser($request->validated());
        if ($token) {
            return $this->successJsonResponse(['accessToken' => $token],'user.login.success');
        }
        return $this->errorJsonResponse(message: 'user.login.error');
    }
}

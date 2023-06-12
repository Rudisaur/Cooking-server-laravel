<?php

namespace App\Http\Controllers;

use App\Enums\TokenType;
use App\Http\Requests\AuthRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function register(AuthRequest $request, AuthService $authService): JsonResponse
    {
        $userId = $authService->createUser($request->validated());
        $refreshToken = $authService->createJWT($userId, TokenType::REFRESH);
        setcookie('refreshToken',$refreshToken, time()+7200);
        $authService->setRefreshToken($userId, $refreshToken);
        return response()->json([
            'accessToken' => $authService->createJWT($userId, TokenType::ACCESS),
        ]);

    }
}

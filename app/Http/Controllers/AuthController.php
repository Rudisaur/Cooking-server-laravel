<?php

namespace App\Http\Controllers;

use App\Enums\TokenType;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        setcookie('X-XSRF-TOKEN', $authService->createUser($request->validated()));
        return response()->json([ 'accessToken' => $authService->createUser($request->validated())]);
//        $userId = $authService->createUser($request->validated());
//        $refreshToken = $authService->createJWT($userId, TokenType::REFRESH);
//        setcookie('refreshToken',$refreshToken, time()+7200);
//        $authService->setRefreshToken($userId, $refreshToken);
//        return response()->json([
//            'accessToken' => $authService->createJWT($userId, TokenType::ACCESS),
//        ]);

    }
    public function login(LoginRequest $request, AuthService $authService){
        $token = $authService->loginUser($request->validated());

        setcookie('X-XSRF-TOKEN',$token);
            return response()->json($token);
        return;
//        $userId = $authService->loginUser($request->validated());
//        $refreshToken = $authService->createJWT($userId, TokenType::REFRESH);
//        setcookie('refreshToken',$refreshToken, time()+7200);
//        $authService->setRefreshToken($userId, $refreshToken);
//        return response()->json([
//            'accessToken' => $authService->createJWT($userId, TokenType::ACCESS),
//        ]);
    }
}

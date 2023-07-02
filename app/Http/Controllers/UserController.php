<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        $token = $authService->createUser($request->validated());
        return response()->json(['accessToken' => $token]);
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        $token = $authService->loginUser($request->validated());
        return response()->json($token);
    }

    public function getUsers ()
    {

    }
}





//        $userId = $authService->createUser($request->validated());
//        $refreshToken = $authService->createJWT($userId, TokenType::REFRESH);
//        setcookie('refreshToken',$refreshToken, time()+7200);
//        $authService->setRefreshToken($userId, $refreshToken);
//        return response()->json([
//            'accessToken' => $authService->createJWT($userId, TokenType::ACCESS),
//        ]);
//        $userId = $authService->loginUser($request->validated());
//        $refreshToken = $authService->createJWT($userId, TokenType::REFRESH);
//        setcookie('refreshToken',$refreshToken, time()+7200);
//        $authService->setRefreshToken($userId, $refreshToken);
//        return response()->json([
//            'accessToken' => $authService->createJWT($userId, TokenType::ACCESS),
//        ]);

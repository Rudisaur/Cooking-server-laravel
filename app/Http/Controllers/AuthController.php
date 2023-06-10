<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function register(AuthRequest $request, AuthService $authService): JsonResponse
    {
        $payload = $authService->createUser($request->validated());
        return response()->json([
            'accessToken' => $authService->getJWT($payload)
        ]);
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpJsonResponse
{
    protected function successJsonResponse(mixed $data = null, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => __($message, locale: response()->cookie('lang')),
            'data' => $data
        ], $code);
    }

    protected function errorJsonResponse(mixed $data = null, ?string $message = null, int $code = 400): JsonResponse
    {
        return response()->json([
            'message' => __($message, locale: response()->cookie('lang')),
            'data' => $data
        ], $code);
    }
}

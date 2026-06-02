<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * success
     *
     * @param  mixed  $message
     * @param  mixed  $statusCode
     */
    public static function success(mixed $data = null, string $message, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * error
     *
     * @param  mixed  $message
     * @param  mixed  $statusCode
     */
    public static function error(string $message, int $statusCode = 500, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

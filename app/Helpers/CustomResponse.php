<?php


namespace App\Helpers;


use Illuminate\Http\JsonResponse;

class CustomResponse
{
    /**
     * @param $message
     * @param array $data
     * @param int $status
     * @return JsonResponse
     */
    static public function successResponse(string $message, object $data, int $status = 200): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data], $status);
    }

    /**
     * @param string $message
     * @param int $status
     * @param string $error
     * @return JsonResponse
     */
    static public function errorResponse(string $message, int $status = 400, array $error = []): JsonResponse
    {
        return response()->json(['message' => $message, 'error' => $error], $status);
    }
}

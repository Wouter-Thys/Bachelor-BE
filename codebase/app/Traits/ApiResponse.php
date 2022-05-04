<?php

namespace App\Traits;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponse
{
    protected function success(array|string|ResourceCollection|UserResource $data, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'success'   => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error( array|string|null $data, string $message, int $code): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'success'   => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }

}

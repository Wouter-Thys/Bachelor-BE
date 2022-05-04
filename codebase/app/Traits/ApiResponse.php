<?php

namespace App\Traits;

use App\Http\Resources\UserResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponse
{
    protected function error( array|string|null $data, string $message, int $code): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'errors' => $data
        ], $code);
    }

}

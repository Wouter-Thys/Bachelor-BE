<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateEmailController extends Controller
{
    use ApiResponse;

    public function __invoke(AuthUserRequest $request): JsonResponse|UserResource
    {
        if ($request->user()->update($request->validated())) {
            return UserResource::make($request->user());
        }

        return $this->error(UserResource::make($request->user()), 'something went wrong please try again!', 400);
    }
}

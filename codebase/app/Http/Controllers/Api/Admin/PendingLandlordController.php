<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLandlordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingLandlordController extends Controller
{
    public function index(): JsonResource
    {
        return UserResource::collection(User::role('pending-landlord')->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user): JsonResource
    {
        ray($user);
        return UserResource::make($user->load('media'));
    }

    public function update(UpdateLandlordRequest $request, User $user): JsonResource
    {
        if ($request->validated()) {
            if ($request->data) {
                $user->assignRole('landlord')->save();
                $user->removeRole('pending-landlord')->save();
            }
            if (!$request->data) {
                $user->removeRole('pending-landlord')->save();
                $user->clearMediaCollection('landlordRequest');
            }
        }

        return new UserResource($user);
    }

    public function destroy($id)
    {
        //
    }
}

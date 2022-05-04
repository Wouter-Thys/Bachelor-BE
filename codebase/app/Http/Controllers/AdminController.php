<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLandlordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use ApiResponse;

    public function users(Request $request)
    {
        return $this->success(UserResource::collection(User::role('user')->get()), 'Success', 201);
    }
    public function adminUsers(Request $request)
    {
        return $this->success(UserResource::collection(User::role('admin')->get()), 'Success', 201);
    }
    public function usersPendingLandlord(Request $request)
    {
        return $this->success(UserResource::collection(User::role('pending-landlord')->with('media')->get()), 'Success', 201);
    }
    public function userPendingLandlord(User $user)
    {
        return $this->success(UserResource::collection($user->load('media')), 'Success', 201);
    }
    public function updateUserPendingLandlord(User $user, UpdateLandlordRequest $request)
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

        return $this->success($user, 'Success', 201);
    }
}

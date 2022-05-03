<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLandlordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        return UserResource::collection(User::role('user')->get());
    }
    public function adminUsers(Request $request)
    {
        return UserResource::collection(User::role('admin')->get());
    }
    public function usersPendingLandlord(Request $request)
    {
        return UserResource::collection(User::role('pending-landlord')->with('media')->get());
    }
    public function userPendingLandlord(User $user)
    {
        return new UserResource($user->load('media'));
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
        return 'Success';
    }
}

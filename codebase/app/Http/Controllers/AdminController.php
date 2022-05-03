<?php

namespace App\Http\Controllers;

use App\Enums\LandlordEnum;
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
        return new UserResource($user->role('pending-landlord')->with('media')->first());
    }
}

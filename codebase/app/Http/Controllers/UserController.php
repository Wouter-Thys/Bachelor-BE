<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    public function requestLandlord(Request $request)
    {
        if ($request->user()->hasRole('landlord')) {
            return $this->error($request->user(), 'Role Error: User is already landlord!', 400);
        }
        if ($request->user()->hasRole('pending-landlord')) {
            return $this->error($request->user(), 'Error: Admin is reviewing your request!', 400);
        }

        if ($request->hasFile('image')) {
            $user = $request->user();

            if($user->hasMedia('landlordRequest')) {
                $user->clearMediaCollection('landlordRequest');
            }
            $user->addMediaFromRequest('image')->toMediaCollection('landlordRequest')->save();

            $user->assignRole('pending-landlord');
            $user->save();

            return $this->success($request->user(), 'Success', 201);
        }


        return $this->error($request->user(), 'Error: Something went wrong please try again!', 400);
    }
}

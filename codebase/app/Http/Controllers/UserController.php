<?php

namespace App\Http\Controllers;

use App\Enums\LandlordEnum;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function requestLandlord(Request $request)
    {
        ray($request);
        if($request->hasFile('image')){
            $user = $request->user();
            $user->addMedia($request->file('image'))->setFileName(Str::uuid()->toString()
        )->toMediaCollection('landlordRequest');
        }
        /*
        if($request->user()->hasRole('landlord')){
            return response()->json([
                'Error' => "User is already landlord!"
            ], 200);
        }
        if($request->user()->hasRole('pending-landlord')){
            return response()->json([
                'Error' => "User is pending results of becoming landlord!"
            ], 200);
        }

        $request->user()->assignRole('pending-landlord');
        $request->user()->save();
        return response()->json([
            'Accepted' => "User is now pending landlord request!"
        ], 202);
        */
    }
}

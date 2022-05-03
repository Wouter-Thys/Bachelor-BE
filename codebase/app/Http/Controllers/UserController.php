<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist as FileDoesNotExistAlias;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig as FileIsTooBigAlias;

class UserController extends Controller
{
    /**
     * @throws FileDoesNotExistAlias
     * @throws FileIsTooBigAlias
     */
    public function requestLandlord(Request $request)
    {

        if ($request->user()->hasRole('landlord')) {
            return response()->json([
                'Error' => "User is already landlord!"
            ], 400);
        }
        if ($request->user()->hasRole('pending-landlord')) {
            return response()->json([
                'Error' => "User is pending results of becoming landlord!"
            ], 400);
        }

        if ($request->hasFile('image')) {
            $user = $request->user();

            if($user->hasMedia('landlordRequest')) {
                $user->clearMediaCollection('landlordRequest');
            }
            $user->addMediaFromRequest('image')->toMediaCollection('landlordRequest')->save();

            $user->assignRole('pending-landlord');
            $user->save();

            return response()->json([
                'Accepted' => "User is now pending landlord request!"
            ], 201);
        }

        return response()->json([
            'Error' => "Make sure u have entered an image!"
        ], 400);
    }
}

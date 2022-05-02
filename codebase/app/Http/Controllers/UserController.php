<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;
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
        Log::info($request);

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

            ($user->hasMedia('landlordRequest'))
                ? $user->clearMediaCollection('landlordRequest')
                : $user->addMediaFromRequest('image')->toMediaCollection('landlordRequest')->save();

            $user->assignRole('pending-landlord');
            $user->save();

            return response()->json([
                'Accepted' => "User is now pending landlord request!"
            ], 202);
        }

        return response()->json([
            'Error' => "Make sure u have entered an image!"
        ], 200);
    }
}

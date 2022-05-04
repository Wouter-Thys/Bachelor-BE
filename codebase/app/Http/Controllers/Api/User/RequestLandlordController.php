<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class RequestLandlordController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        if ($request->user()->id === $user->id) {
            if ($user->hasRole('landlord')) {
                return $this->error($request->user(), 'Role Error: User is already landlord!', 400);
            }
            if ($user->hasRole('pending-landlord')) {
                return $this->error($request->user(), 'Error: Admin is reviewing your request!', 400);
            }

            if ($request->hasFile('image')) {
                if ($user->hasMedia('landlordRequest')) {
                    $user->clearMediaCollection('landlordRequest');
                }
                $user->addMediaFromRequest('image')->toMediaCollection('landlordRequest')->save();

                $user->assignRole('pending-landlord');
                $user->save();

                return UserResource::make($user);
            }
        }

        return $this->error($user, 'Error: Something went wrong please try again!', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

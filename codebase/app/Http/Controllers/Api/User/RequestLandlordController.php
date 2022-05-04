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

    public function store(Request $request)
    {
        if ($request->user()->hasRole('landlord')) {
            return $this->error($request->user(), 'Role Error: User is already landlord!', 400);
        }
        if ($request->user()->hasRole('pending-landlord')) {
            return $this->error($request->user(), 'Error: Admin is reviewing your request!', 400);
        }

        if ($request->hasFile('image')) {
            if ($request->user()->hasMedia('landlordRequest')) {
                $request->user()->clearMediaCollection('landlordRequest');
            }
            $request->user()->addMediaFromRequest('image')->toMediaCollection('landlordRequest')->save();

            $request->user()->assignRole('pending-landlord');
            $request->user()->save();

            return UserResource::make($request->user());
        }


        return $this->error($request->user(), 'Error: Something went wrong please try again!', 400);
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

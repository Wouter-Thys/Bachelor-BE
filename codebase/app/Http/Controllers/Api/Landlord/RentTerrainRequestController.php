<?php

namespace App\Http\Controllers\Api\Landlord;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLandlordRentTerrainRequest;
use App\Http\Resources\RentTerrainResource;
use App\Mail\User\ApprovedRentTerrainMail;
use App\Mail\User\RejectedRentTerrainMail;
use App\Models\RentTerrain;
use Illuminate\Http\Request;
use Mail;

class RentTerrainRequestController extends Controller
{
    public function index(Request $request)
    {
        return RentTerrainResource::collection(RentTerrain::where('approvalStatus',
            ApprovalStatusEnum::PENDING)->whereIn('terrain_id', $request->user()->terrains()->get('id'))->get());
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(UpdateLandlordRentTerrainRequest $request, $id)
    {
        if ($request->validated()['approveTerrainRent']) {
            $rentTerrain = RentTerrain::where('id',
                $id)->whereIn('terrain_id',
                $request->user()->terrains()->get('id'))->first();
            $rentTerrain->update(['approvalStatus' => ApprovalStatusEnum::APPROVED]);
            $rentTerrain->save();
            Mail::to($rentTerrain->user)->send(new ApprovedRentTerrainMail($rentTerrain));
        }
        if (!$request->validated()['approveTerrainRent']) {
            $rentTerrain = RentTerrain::where('id',
                $id)->whereIn('terrain_id',
                $request->user()->terrains()->get('id'))->first();
            $rentTerrain->update(['approvalStatus' => ApprovalStatusEnum::REJECTED]);
            $rentTerrain->save();
            Mail::to($rentTerrain->user)->send(new RejectedRentTerrainMail($rentTerrain));
        }
    }

    public function destroy($id)
    {
        //
    }
}

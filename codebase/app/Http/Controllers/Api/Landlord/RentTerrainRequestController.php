<?php

namespace App\Http\Controllers\Api\Landlord;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLandlordRentTerrainRequest;
use App\Http\Resources\RentTerrainResource;
use App\Models\RentTerrain;
use Illuminate\Http\Request;

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
            RentTerrain::where('id',
                $id)->whereIn('terrain_id',
                $request->user()->terrains()->get('id'))->update(['approvalStatus' => ApprovalStatusEnum::APPROVED]);
        }
        if (!$request->validated()['approveTerrainRent']) {
            RentTerrain::where('id',
                $id)->whereIn('terrain_id',
                $request->user()->terrains()->get('id'))->update(['approvalStatus' => ApprovalStatusEnum::REJECTED]);
        }
    }

    public function destroy($id)
    {
        //
    }
}

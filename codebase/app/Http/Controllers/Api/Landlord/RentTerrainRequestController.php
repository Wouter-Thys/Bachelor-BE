<?php

namespace App\Http\Controllers\Api\Landlord;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\RentTerrainResource;
use App\Models\RentTerrain;
use Illuminate\Http\Request;

class RentTerrainRequestController extends Controller
{
    public function index(Request $request)
    {
        return RentTerrainResource::collection(RentTerrain::where('approvalStatus',
            ApprovalStatusEnum::PENDING)->findMany($request->user()->terrains()->get('id')));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
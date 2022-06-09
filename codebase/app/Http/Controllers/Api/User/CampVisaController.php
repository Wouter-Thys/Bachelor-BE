<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCampVisaRequest;
use App\Http\Resources\RentTerrainResource;
use App\Models\CampVisa;
use Illuminate\Http\Request;

class CampVisaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
    {
        return RentTerrainResource::make($request->user()->rentTerrains()->where('id', $id)->with('campVisa')->first());
    }

    public function update(UpdateCampVisaRequest $request, CampVisa $campVisa)
    {
        if ($request->user()->rentTerrains()->where('id', $campVisa->rent_terrain_id)->exists()) {
            $campVisa->update($request->validated());
        }

        return RentTerrainResource::make($request->user()->rentTerrains()->where('id',
            $campVisa->rent_terrain_id)->with('campVisa')->first());
    }

    public function destroy($id)
    {
        //
    }
}

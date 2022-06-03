<?php

namespace App\Http\Controllers\Api\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentTerrainResource;
use App\Models\RentTerrain;
use Illuminate\Http\Request;

class RentTerrainController extends Controller
{
    public function index(Request $request)
    {
        return RentTerrainResource::collection(RentTerrain::findMany($request->user()->terrains()->get('id')));
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

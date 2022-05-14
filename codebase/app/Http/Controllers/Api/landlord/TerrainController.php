<?php

namespace App\Http\Controllers\Api\landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Resources\TerrainResource;
use App\Models\Terrain;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        return TerrainResource::collection($request->user()->terrains);
    }

    public function store(StoreTerrainRequest $request)
    {
        $terrain = Terrain::create(array_merge($request->validated(), ["user_id" => $request->user()->id]));
        $tempMedia = $request->user()->getMedia('terrainTempImages');
        foreach ($request->validated()['images'] as $image) {
            $mediaItem = $tempMedia->where('id', $image['id'])->first();
            $mediaItem->move($terrain, 'terrainImages');
        }

        return $terrain->id;
    }

    public function show(Request $request, Terrain $terrain)
    {
        if ($request->user()->terrains()->where('id', $terrain->id)->exists()) {
            return TerrainResource::make($terrain);
        }

        return $this->error($request->user(), 'something went wrong try again!', 400);
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

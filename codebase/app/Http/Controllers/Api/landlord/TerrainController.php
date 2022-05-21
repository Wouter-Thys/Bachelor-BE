<?php

namespace App\Http\Controllers\Api\landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteTerrainRequest;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;
use App\Http\Resources\TerrainResource;
use App\Models\Terrain;
use App\Services\ImageService;
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
        ImageService::TempImageToTerrainImage($request->user()->getMedia('terrainTempImages'),
            $request->validated()['images'], $terrain);

        return $terrain->id;
    }

    public function show(Request $request, Terrain $terrain)
    {
        if ($request->user()->terrains()->where('id', $terrain->id)->exists()) {
            return TerrainResource::make($terrain);
        }

        return $this->error($request->user(), 'something went wrong try again!', 400);
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $terrain->update($request->validated());
        ImageService::TempImageToTerrainImage($request->user()->getMedia('terrainTempImages'),
            $request->validated()['newImages'], $terrain);
        foreach ($request->validated()['deleteImages'] as $id) {
            $terrain->deleteMedia($id);
        }
        $terrain->load('media');

        return TerrainResource::make($terrain);
    }

    public function destroy(DeleteTerrainRequest $request, Terrain $terrain)
    {
        $terrain->delete();
    }
}

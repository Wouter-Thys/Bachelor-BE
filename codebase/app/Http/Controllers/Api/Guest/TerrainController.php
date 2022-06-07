<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTerrainRequest;
use App\Http\Resources\TerrainResource;
use App\Models\Terrain;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return TerrainResource::collection(Terrain::orderBy('capacity',
            'asc')->get());
    }

    public function store(StoreTerrainRequest $request)
    {
        //
    }

    public function show(Terrain $terrain)
    {
        $terrain->update(['views' => $terrain->views + 1]);

        return TerrainResource::make($terrain);
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

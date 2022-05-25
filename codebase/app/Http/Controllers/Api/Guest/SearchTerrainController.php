<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchTerrainRequest;
use App\Http\Resources\TerrainResource;
use App\Models\Terrain;
use Arr;

class SearchTerrainController extends Controller
{
    public function __invoke(SearchTerrainRequest $request)
    {
        $filteredBoolean = Arr::where($request->validated(), function ($value, $key) {
            return ($value === 1);
        });

        $terrains = Terrain::where($filteredBoolean)
            ->where(function ($query) use ($request) {
                $query->where('province', 'like', '%'.$request->validated()['search'].'%')
                    ->orWhere('postcode', 'like', '%'.$request->validated()['search'].'%');
            })
            ->where(function ($query) use ($request) {
                if ($request->validated()['max_people'] !== 0 && $request->validated()['max_people'] !== null) {
                    $query->whereBetween('max_people',
                        [$request->validated()['max_people'], $request->validated()['max_people'] + 50]);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->validated()['hectare'] !== 0 && $request->validated()['hectare'] !== null) {
                    $query->whereBetween('hectare',
                        [
                            $request->validated()['hectare'],
                            $request->validated()['hectare'] + $request->validated()['hectare']
                        ]);
                }
            })->get();

        return TerrainResource::collection($terrains);
    }
}

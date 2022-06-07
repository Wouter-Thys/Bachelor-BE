<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentTerrainRequest;
use App\Http\Resources\RentTerrainResource;
use App\Models\RentTerrain;
use App\Traits\ApiResponse;
use Carbon\Carbon;

class RentTerrainController extends Controller
{
    use ApiResponse;

    public function __invoke(RentTerrainRequest $request)
    {
        $startDate = Carbon::parse($request->validated()['startDate'] / 1000)->startOfDay();
        $endDate = Carbon::parse($request->validated()['endDate'] / 1000)->startOfDay();
        $terrainId = $request->validated()['terrain_id'];

        $rentTerrain = RentTerrain::where('terrain_id', $terrainId)->where(function ($query) use (
            $startDate,
            $endDate
        ) {
            $query->where(function ($query) use ($startDate, $endDate) {
                $query->where('startDate', '>=', $startDate)
                    ->where('endDate', '>=', $endDate)
                    ->where('startDate', '<=', $endDate);
            })
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('startDate', '<=', $startDate)
                        ->where('endDate', '<=', $endDate)
                        ->where('endDate', '>=', $startDate);
                })
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('startDate', '<=', $startDate)
                        ->where('endDate', '>=', $endDate);
                })
                ->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('startDate', '>=', $startDate)
                        ->where('endDate', '<=', $endDate);
                });
        })->count();
        if ($rentTerrain === 0) {
            return RentTerrainResource::make(RentTerrain::create(array_merge($request->validated(), [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'user_id' => $request->user()->id,
            ])));
        } else {
            return $this->error(null, "Terrain is not available during the selected period!", 400);
        }
    }
}

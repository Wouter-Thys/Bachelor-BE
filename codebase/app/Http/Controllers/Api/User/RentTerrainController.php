<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentTerrainRequest;
use App\Models\RentTerrain;
use App\Traits\ApiResponse;
use Carbon\Carbon;

class RentTerrainController extends Controller
{
    use ApiResponse;

    public function __invoke(RentTerrainRequest $request)
    {
        RentTerrain::create(array_merge($request->validated(), [
            'startDate' => Carbon::parse($request->validated()['startDate'] / 1000),
            'endDate' => Carbon::parse($request->validated()['endDate'] / 1000),
            'user_id' => $request->user()->id,
        ]));
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteRentTerrainRequest;
use App\Http\Resources\RentTerrainResource;
use Illuminate\Http\Request;

class RentTerrainRequestController extends Controller
{
    public function index(Request $request)
    {
        return RentTerrainResource::collection($request->user()->rentTerrains()->orderBy('startDate', 'asc')->get());
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

    public function destroy(Request $request, $id)
    {
        $request->user()->rentTerrains()->where('id', $id)->delete();
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentTerrainResource;
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api\landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\TempImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TempImageController extends Controller
{
    public function index()
    {
        //
    }

    public function store(TempImageRequest $request)
    {
        if ($request->hasFile("images")) {
            if ($request->user()->hasMedia('terrainTempImages')) {
                $request->user()->clearMediaCollection('terrainTempImages');
            }
            foreach ($request->validated()["images"] as $image) {
                $request->user()->addMedia($image)->setFileName('temp-'.Str::uuid()->toString().".".pathinfo($image->getClientOriginalName(),
                        PATHINFO_EXTENSION))->toMediaCollection('terrainTempImages')->save();
            }
        }
        ray($request->user()->getFirstMediaUrl('terrainTempImages'));

        return $request->user()->getMedia('terrainTempImages');
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

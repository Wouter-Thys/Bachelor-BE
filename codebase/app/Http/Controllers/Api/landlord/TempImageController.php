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

        $images = collect($request->user()->getMedia('terrainTempImages'))->map(fn($image
        ) => ['id' => $image->id, 'url' => $image->getUrl()]);

        return $images;
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
        $request->user()->deleteMedia($id);
        $request->user()->load('media');

        $images = collect($request->user()->getMedia('terrainTempImages'))->map(fn($image
        ) => ['id' => $image->id, 'url' => $image->getUrl()]);
        
        return $images;
    }
}

<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class ImageService
{
    public static function TempImageToTerrainImage(
        MediaCollection $mediaCollection,
        array $media,
        Model $model
    ): void {
        if (!empty($media)) {
            foreach ($media as $image) {
                $mediaItem = $mediaCollection->where('id', $image['id'])->first();
                $mediaItem->move($model, 'terrainImages');
            }
        }
    }
}

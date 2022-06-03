<?php

namespace Database\Seeders;

use App\Models\Terrain;
use File;
use Illuminate\Database\Seeder;

class TerrainSeeder extends Seeder
{
    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function run()
    {
        $addresses = json_decode(File::get("database/data/addresses.json"));
        $imagesUrl = json_decode(File::get("database/data/imagesUrl.json"));

        foreach ($addresses as $key => $value) {
            $terrain = Terrain::factory()->create([
                "street" => $value->street,
                "streetNumber" => $value->streetNumber,
                "postcode" => $value->postcode,
                "province" => $value->province,
                "locality" => $value->locality,
            ]);

            $terrain->addMediaFromUrl($imagesUrl[$key]->image1)->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl($imagesUrl[$key]->image2)->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl($imagesUrl[$key]->image3)->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl($imagesUrl[$key]->image4)->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl($imagesUrl[$key]->image5)->toMediaCollection('terrainImages')->save();
        }
    }
}

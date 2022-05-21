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
        $json = File::get("database/data/addresses.json");
        $addresses = json_decode($json);

        foreach ($addresses as $key => $value) {
            $terrain = Terrain::factory()->create([
                "user_id" => 1,
                "street" => $value->street,
                "streetNumber" => $value->streetNumber,
                "postcode" => $value->postalcode,
                "province" => $value->province,
                "locality" => $value->city,
            ]);

            $terrain->addMediaFromUrl('https://www.terrain-construction.com/content/wp-content/uploads/2019/03/niveler-terrain-min-e1553698896855.jpg')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://www.blavier.be/layout/uploads/2020/06/Blog-terrains.jpg')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://www.ourendangeredworld.com/wp-content/uploads/2020/12/open-field-terrain.jpg.webp')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://file.bienici.com/photo/orpi-1-012933E1XUGB_media.immo-facile.com_office6_orpi_73301_catalog_images_pr_p_9_0_3_2_7_4_7_9032747a.jpg_DATEMAJ_202105291928?width=600&height=370&fit=cover')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://media.istockphoto.com/photos/picturesque-morning-in-plitvice-national-park-colorful-spring-scene-picture-id1093110112?k=20&m=1093110112&s=612x612&w=0&h=3OhKOpvzOSJgwThQmGhshfOnZTvMExZX2R91jNNStBY=')->toMediaCollection('terrainImages')->save();
        }
    }
}

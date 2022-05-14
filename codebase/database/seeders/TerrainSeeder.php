<?php

namespace Database\Seeders;

use App\Models\Terrain;
use Illuminate\Database\Seeder;

class TerrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terrains = Terrain::factory(10)->create([
            "user_id" => 1,
        ]);
        foreach ($terrains as $terrain) {
            $terrain->addMediaFromUrl('https://www.terrain-construction.com/content/wp-content/uploads/2019/03/niveler-terrain-min-e1553698896855.jpg')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://www.blavier.be/layout/uploads/2020/06/Blog-terrains.jpg')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://www.ourendangeredworld.com/wp-content/uploads/2020/12/open-field-terrain.jpg.webp')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://file.bienici.com/photo/orpi-1-012933E1XUGB_media.immo-facile.com_office6_orpi_73301_catalog_images_pr_p_9_0_3_2_7_4_7_9032747a.jpg_DATEMAJ_202105291928?width=600&height=370&fit=cover')->toMediaCollection('terrainImages')->save();
            $terrain->addMediaFromUrl('https://files.zimmo.be/QNz1EHbXc0zLcSXsyuhgFIqHhRU=/828x618/filters:image-format(pjpg)/86/58/dc05-8330-4ab2-843c-d6bbef3c8933/foto_zimmo_5448e9080fe7ea165f969bfd1ee8e1c9.jpg')->toMediaCollection('terrainImages')->save();
        }
    }
}

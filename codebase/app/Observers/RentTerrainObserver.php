<?php

namespace App\Observers;

use App\Models\CampVisa;
use App\Models\RentTerrain;

class RentTerrainObserver
{
    /**
     * Handle the RentTerrain "created" event.
     *
     * @param  \App\Models\RentTerrain  $rentTerrain
     * @return void
     */
    public function created(RentTerrain $rentTerrain)
    {
        CampVisa::create(['rent_terrain_id' => $rentTerrain->id]);
    }

    /**
     * Handle the RentTerrain "updated" event.
     *
     * @param  \App\Models\RentTerrain  $rentTerrain
     * @return void
     */
    public function updated(RentTerrain $rentTerrain)
    {
        //
    }

    /**
     * Handle the RentTerrain "deleted" event.
     *
     * @param  \App\Models\RentTerrain  $rentTerrain
     * @return void
     */
    public function deleted(RentTerrain $rentTerrain)
    {
        //
    }

    /**
     * Handle the RentTerrain "restored" event.
     *
     * @param  \App\Models\RentTerrain  $rentTerrain
     * @return void
     */
    public function restored(RentTerrain $rentTerrain)
    {
        //
    }

    /**
     * Handle the RentTerrain "force deleted" event.
     *
     * @param  \App\Models\RentTerrain  $rentTerrain
     * @return void
     */
    public function forceDeleted(RentTerrain $rentTerrain)
    {
        //
    }
}

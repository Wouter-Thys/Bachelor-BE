<?php

namespace App\Observers;

use App\Models\Terrain;
use App\Services\AddressService;
use App\Services\GoogleService;
use Http;

class TerrainObserver
{
    /**
     * Handle the Terrain "created" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function creating(Terrain $terrain)
    {
        $result = HTTP::post('https://maps.googleapis.com/maps/api/geocode/json?address='.AddressService::addressToString($terrain).'&key='.config('api-env.googleApi'))->json();
        if ($result['results'][0]['geometry']['location']) {
            $terrain->latitude = $result['results'][0]['geometry']['location']['lat'];
            $terrain->longitude = $result['results'][0]['geometry']['location']['lng'];
        }
        $terrain->google_supermarket_rating = GoogleService::GoogleRating($terrain, 'supermarket');
        $terrain->google_activities_rating = GoogleService::GoogleRating($terrain, 'activities');
        $terrain->google_remote_rating = GoogleService::GoogleRating($terrain, 'remote');
        $terrain->google_bakery_rating = GoogleService::GoogleRating($terrain, 'bakery');
        $terrain->google_firstAid_rating = GoogleService::GoogleRating($terrain, 'firstAid');
    }

    /**
     * Handle the Terrain "created" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     */
    public function created(Terrain $terrain)
    {
        //
    }

    /**
     * Handle the Terrain "updated" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     */
    public function updated(Terrain $terrain)
    {
        //
    }

    /**
     * Handle the Terrain "deleted" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     */
    public function deleted(Terrain $terrain)
    {
        //
    }

    /**
     * Handle the Terrain "restored" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     */
    public function restored(Terrain $terrain)
    {
        //
    }

    /**
     * Handle the Terrain "force deleted" event.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return void
     */
    public function forceDeleted(Terrain $terrain)
    {
        //
    }
}

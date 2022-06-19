<?php

namespace App\Observers;

use App\Jobs\GoogleRatingJob;
use App\Models\Terrain;
use App\Services\AddressService;
use Http;

class TerrainObserver
{
    public function creating(Terrain $terrain): void
    {
        $result = HTTP::post('https://maps.googleapis.com/maps/api/geocode/json?address='.AddressService::addressToString($terrain).'&key='.config('api-env.googleApi'))->json();
        if ($result['results'][0]['geometry']['location']) {
            $terrain->latitude = $result['results'][0]['geometry']['location']['lat'];
            $terrain->longitude = $result['results'][0]['geometry']['location']['lng'];
        }
    }

    public function created(Terrain $terrain): void
    {
        GoogleRatingJob::dispatch($terrain);
    }

    public function updated(Terrain $terrain): void
    {
        //
    }

    public function deleted(Terrain $terrain): void
    {
        //
    }

    public function restored(Terrain $terrain): void
    {
        //
    }

    public function forceDeleted(Terrain $terrain): void
    {
        //
    }
}

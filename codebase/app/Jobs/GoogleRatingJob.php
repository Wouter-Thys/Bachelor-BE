<?php

namespace App\Jobs;

use App\Models\Terrain;
use App\Services\GoogleService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class GoogleRatingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Terrain $terrain;

    public function __construct(Terrain $terrain)
    {
        $this->terrain = $terrain;
    }

    public function handle()
    {
        Redis::throttle('GoogleRating')->allow(2)->every(1)->then(function () {
            $this->terrain->google_supermarket_rating = GoogleService::GoogleRating($this->terrain, 'supermarket');
            $this->terrain->google_activities_rating = GoogleService::GoogleRating($this->terrain, 'activities');
            $this->terrain->google_remote_rating = GoogleService::GoogleRating($this->terrain, 'remote');
            $this->terrain->google_bakery_rating = GoogleService::GoogleRating($this->terrain, 'bakery');
            $this->terrain->google_firstAid_rating = GoogleService::GoogleRating($this->terrain, 'firstAid');
            $this->terrain->save();
            Log::info('Google rating creation requested '.$this->terrain->name);
        }, function () {
            // Could not obtain lock; this job will be re-queued
            return $this->release(2);
        });
    }
}

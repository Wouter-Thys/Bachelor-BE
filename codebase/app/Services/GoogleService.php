<?php

namespace App\Services;

use App\Models\Terrain;
use Http;

class GoogleService
{
    public static function GoogleRating(Terrain $terrain, string $activities): int
    {
        switch ($activities) {
            case('supermarket'):
            case('bakery'):
                $radius = 10000;
                $growRadius = 5000;

                return self::getRating($terrain, $radius, $growRadius, $activities);

            case('activities'):
                $radius = 2000;
                $growRadius = 2000;

                return self::getRating($terrain, $radius, $growRadius, $activities);

            case('remote'):
            case('firstAid'):
                $radius = 5000;
                $growRadius = 5000;

                return self::getRating($terrain, $radius, $growRadius, $activities);

            default:
                return 'Something went wrong.';
        }
    }

    public static function getRating(Terrain $terrain, int $radius, int $growRadius, string $activities): int
    {
        for ($i = 5; $i >= 1; $i--) {
            $rating = $i;
            $result = self::nearBySearch($terrain, $radius, $activities);
            if (!empty($result['results'])) {
                break;
            }
            $radius = $radius + $growRadius;
        }

        return $rating;
    }

    public static function nearBySearch(Terrain $terrain, int $radius, string $activities)
    {
        return match ($activities) {
            'supermarket' => HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&radius='.$radius.'&type=supermarket&key='.config('api-env.googleApi'))->json(),
            'activities' => HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&radius='.$radius.'&keyword=activities&key='.config('api-env.googleApi'))->json(),
            'bakery' => HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&radius='.$radius.'&type=bakery&key='.config('api-env.googleApi'))->json(),
            'remote' => HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&radius='.$radius.'&type=city_hall&key='.config('api-env.googleApi'))->json(),
            'firstAid' => HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&radius='.$radius.'&type=doctor&key='.config('api-env.googleApi'))->json(),
            default => 'Something went wrong.',
        };
    }
}

<?php

namespace App\Services;

use App\Models\Terrain;
use Http;

class GoogleService
{
    public static function nearBySearch(Terrain $terrain) // string $activities
    {
        /*
        switch ($activities) {
            case('supermarket'):
                $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&type=supermarket&key='.config('api-env.googleApi'))->json();
                break;
            case('activities'):
                $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&keyword=activities&key='.config('api-env.googleApi'))->json();
                break;
            case('bakery'):
                $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&type=bakery&key='.config('api-env.googleApi'))->json();
                break;
            case('remote'):
                $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&type=city_hall&key='.config('api-env.googleApi'))->json();
                break;
            case('playground'):
                $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&type=point_of_interest&key='.config('api-env.googleApi'))->json();
                break;

            default:
                $msg = 'Something went wrong.';
        }
        */
        $result = HTTP::post('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$terrain->latitude.','.$terrain->longitude.'&rankby=distance&keyword=activities&key='.config('api-env.googleApi'))->json();
        ray($result);
    }
}

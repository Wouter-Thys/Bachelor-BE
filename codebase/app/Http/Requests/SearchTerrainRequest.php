<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchTerrainRequest extends FormRequest
{
    public function rules()
    {
        return [
            "water" => ["boolean", "nullable"],
            "electricity" => ["boolean", "nullable"],
            "threePhaseElectricity" => ["boolean", "nullable"],
            "sanitaryBlock" => ["boolean", "nullable"],
            "showers" => ["boolean", "nullable"],
            "toilets" => ["boolean", "nullable"],
            "sinks" => ["boolean", "nullable"],
            "capacity" => ["integer", "nullable"],
            "hectare" => ["numeric", "nullable"],
            "search" => ["string", "nullable"],
            "orderBy" => ["required"],
            "orderBy.column" => [
                "required",
                "in:capacity,hectare,supermarket_rating,activities_rating,remote_rating,bakery_rating,firstAid_rating"
            ],
            "orderBy.direction" => ["required", "in:asc,desc"],
        ];
    }
}

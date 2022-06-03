<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerrainRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => ["required", "string"],
            "description" => ["string"],
            "street" => ["required", "string"],
            "streetNumber" => ["required", "string"],
            "postcode" => ["required", "string"],
            "province" => ["required", "string"],
            "locality" => ["required", "string"],
            "water" => ["required", "boolean"],
            "electricity" => ["required", "boolean"],
            "threePhaseElectricity" => ["required", "boolean"],
            "sanitaryBlock" => ["required", "boolean"],
            "showers" => ["required", "boolean"],
            "toilets" => ["required", "boolean"],
            "sinks" => ["required", "boolean"],
            "capacity" => ["required", "integer"],
            "hectare" => ["required", "numeric"],
            "supermarket_rating" => ["required", "integer", "max:5", "min:1"],
            "activities_rating" => ["required", "integer", "max:5", "min:1"],
            "remote_rating" => ["required", "integer", "max:5", "min:1"],
            "bakery_rating" => ["required", "integer", "max:5", "min:1"],
            "firstAid_rating" => ["required", "integer", "max:5", "min:1"],
            "images" => ["required", "array"],
        ];
    }
}

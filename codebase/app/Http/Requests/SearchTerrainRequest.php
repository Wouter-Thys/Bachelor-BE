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
        ];
    }
}

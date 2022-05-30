<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentTerrainRequest extends FormRequest
{
    public function rules()
    {
        return [
            "startDate" => ['required', 'numeric'],
            "endDate" => ['required', 'numeric'],
            "terrain_id" => ['required', 'integer', 'exists:App\Models\Terrain,id'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandlordRentTerrainRequest extends FormRequest
{
    public function rules()
    {
        return [
            "approveTerrainRent" => ['required', 'boolean']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLandlordRequest extends FormRequest
{
    public function rules()
    {
        return [
            "image" => ['required', 'mimes:jpg,jpeg,png']
        ];
    }
}

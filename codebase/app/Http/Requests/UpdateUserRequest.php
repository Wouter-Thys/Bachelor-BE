<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => ['required', 'string'],
            "organization" => ['required', 'string'],
            "phone_number" => ['required', 'string'],
        ];
    }
}

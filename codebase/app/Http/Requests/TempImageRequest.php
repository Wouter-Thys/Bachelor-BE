<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempImageRequest extends FormRequest
{
    public function rules(): array
    {
        ray($this);

        return [
            'images.*' => ['image', 'mimes:png,jpeg,jpg'],
        ];
    }
}

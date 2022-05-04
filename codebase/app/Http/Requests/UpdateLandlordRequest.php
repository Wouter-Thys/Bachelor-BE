<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateLandlordRequest extends FormRequest
{
    use ApiResponse;
    #[ArrayShape(['data' => "string[]"])] public function rules(): array
    {
        return [
            'data' => ['required', 'boolean']
        ];
    }
}

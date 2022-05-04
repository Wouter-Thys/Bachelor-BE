<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateLandlordRequest extends FormRequest
{
    use ApiResponse;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data' => ['required', 'boolean'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->error($validator->errors(), 'Validation errors', 400));
    }
}

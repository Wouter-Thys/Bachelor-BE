<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    use PasswordValidationRules;

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'unique:users', 'email'],
            'password' => ['required', 'current_password:sanctum'],
        ];
    }
}

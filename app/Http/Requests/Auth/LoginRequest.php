<?php

namespace App\Http\Requests\Auth;

use App\Http\Payloads\Auth\LoginPayload;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255']
        ];
    }

    public function payload(): LoginPayload
    {
        return LoginPayload::make($this->validated());
    }
}

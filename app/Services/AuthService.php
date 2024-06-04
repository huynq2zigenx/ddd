<?php

namespace App\Services;

use App\Http\Payloads\Auth\LoginPayload;
use Illuminate\Auth\AuthManager;
use Laravel\Sanctum\NewAccessToken;

final readonly class AuthService 
{
    public function __construct(private AuthManager $auth)
    {
    }

    public function login(LoginPayload $payload): bool 
    {
        return $this->auth->attempt(
            credentials: $payload->toArray()
        );
    }

    public function createToken(string $name): NewAccessToken
    {
        return $this->auth->user()?->createToken(
            name: $name,
        );
    }


}
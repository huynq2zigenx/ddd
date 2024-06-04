<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\Auth\AuthenticationFailure;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Responses\TokenResponse;
use App\Services\AuthService;
use Symfony\Component\HttpFoundation\Response;

final class LoginController
{
    public function __construct(
        private AuthService $authService
    )
    {}

    public function __invoke(LoginRequest $request): TokenResponse
    {
        if(!$this->authService->login($request->payload())) {
            throw new AuthenticationFailure(
                message: 'Invalid Credentials',
                code: Response::HTTP_UNAUTHORIZED
            );
        }

        return new TokenResponse(
            token: $this->authService->createToken(
                name: 'test'
            )
        );
    }
}
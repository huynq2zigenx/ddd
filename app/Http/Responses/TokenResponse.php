<?php

namespace  App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\NewAccessToken;
use Symfony\Component\HttpFoundation\Response;

final class TokenResponse implements Responsable
{
    public function __construct(
        private readonly NewAccessToken $token
    )
    {}

    public function toResponse($request): Response
    {
        return new JsonResponse(
            data: [
                'token' => $this->token->plainTextToken
            ]
        );
    }
}
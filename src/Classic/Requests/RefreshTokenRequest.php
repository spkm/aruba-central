<?php

namespace spkm\ArubaCentral\Classic\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Swap a refresh token for a new access token and refresh token: POST /oauth2/token, with the client and the grant
 * in the query string.
 */
class RefreshTokenRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(protected string $clientId, protected string $clientSecret, protected string $refreshToken) {}

    public function resolveEndpoint(): string
    {
        return '/oauth2/token';
    }

    /**
     * @return array<string, string>
     */
    protected function defaultQuery(): array
    {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->refreshToken,
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}

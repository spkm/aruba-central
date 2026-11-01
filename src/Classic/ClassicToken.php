<?php

namespace spkm\ArubaCentral\Classic;

use Carbon\CarbonImmutable;

/**
 * The token pair classic Central issues: an access token good for two hours and the refresh token that replaces
 * it, which each refresh rotates.
 */
final readonly class ClassicToken
{
    public function __construct(public string $accessToken, public string $refreshToken, public CarbonImmutable $expiresAt) {}

    /**
     * @param  array<string, mixed>  $values  As stored: access_token, refresh_token, expires_at (Unix seconds).
     */
    public static function from(array $values): ?self
    {
        $accessToken = $values['access_token'] ?? null;
        $refreshToken = $values['refresh_token'] ?? null;
        $expiresAt = $values['expires_at'] ?? null;

        if (! is_string($accessToken) || $accessToken === '' || ! is_string($refreshToken) || $refreshToken === '' || ! is_numeric($expiresAt)) {
            return null;
        }

        return new self($accessToken, $refreshToken, CarbonImmutable::createFromTimestamp((int) $expiresAt));
    }

    /**
     * Whether the access token is a minute or less from expiring.
     */
    public function isExpiring(): bool
    {
        return $this->expiresAt->getTimestamp() - 60 <= CarbonImmutable::now()->getTimestamp();
    }

    /**
     * @return array{access_token: string, refresh_token: string, expires_at: int}
     */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_at' => $this->expiresAt->getTimestamp(),
        ];
    }
}

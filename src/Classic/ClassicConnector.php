<?php

namespace spkm\ArubaCentral\Classic;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\RefreshTokenRequest;
use spkm\ArubaCentral\Classic\Resources\HasResources;
use spkm\ArubaCentral\Classic\TokenStore\TokenStore;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Query\Query as BaseQuery;

/**
 * The connection to one classic Central tenant: its API gateway app's token pair (refreshed before the first
 * request and whenever the access token is about to expire, and kept in a TokenStore because every refresh
 * replaces the refresh token), timeouts and retries, with a resource for every API classic Central documents and
 * ad-hoc calls for anything else.
 */
class ClassicConnector extends ArubaConnector
{
    use HasResources;

    public function __construct(
        protected string $clientId,
        protected string $clientSecret,
        string $baseUrl,
        protected TokenStore $store,
        protected ?string $seedRefreshToken = null,
    ) {
        parent::__construct($baseUrl);
    }

    public function side(): string
    {
        return 'classic';
    }

    public function newQuery(): BaseQuery
    {
        return Query::make();
    }

    public function tokenStore(): TokenStore
    {
        return $this->store;
    }

    /**
     * The token pair the connection holds, for an application that wants to show it or move it elsewhere.
     */
    public function token(): ?ClassicToken
    {
        return $this->store->get($this->tokenKey());
    }

    /**
     * Forget the stored token pair, so the next request starts again from the configured refresh token.
     */
    public function forgetToken(): void
    {
        $this->store->forget($this->tokenKey());
        $this->authenticator = null;
    }

    /**
     * Swap the refresh token held for a new token pair now, and store it.
     */
    public function refreshToken(): ClassicToken
    {
        $lock = Cache::lock('aruba.classic.refresh.'.$this->tokenKey(), 15);

        try {
            $lock->block(15);

            // Another process may have refreshed while this one waited.
            $stored = $this->store->get($this->tokenKey());

            if ($stored !== null && $stored->refreshToken !== $this->lastSeen?->refreshToken && ! $stored->isExpiring()) {
                return $this->hold($stored);
            }

            $refreshToken = $stored->refreshToken ?? $this->seedRefreshToken;

            if ($refreshToken === null) {
                throw new InvalidArgumentException('The classic Central connection needs a refresh_token: generate a token under API Gateway > System Apps & Tokens and put its refresh token in ARUBA_CLASSIC_REFRESH_TOKEN.');
            }

            $response = parent::send(new RefreshTokenRequest($this->clientId, $this->clientSecret, $refreshToken));

            if (! $response->successful()) {
                throw $this->refused($response);
            }

            $json = $response->json();
            $token = ClassicToken::from([
                'access_token' => $json['access_token'] ?? null,
                'refresh_token' => $json['refresh_token'] ?? null,
                'expires_at' => CarbonImmutable::now()->addSeconds(is_numeric($json['expires_in'] ?? null) ? (int) $json['expires_in'] : 7200)->getTimestamp(),
            ]);

            if ($token === null) {
                throw new UnauthorizedException($response);
            }

            $this->store->put($this->tokenKey(), $token);

            return $this->hold($token);
        } finally {
            $lock->release();
        }
    }

    protected function isTokenRequest(Request $request): bool
    {
        return $request instanceof RefreshTokenRequest;
    }

    /**
     * Holds a valid access token before each request: the stored one while it has more than a minute left, else a
     * refreshed one. Building a connector never contacts Central.
     */
    protected function ensureAuthenticated(Request $request): void
    {
        if ($this->isTokenRequest($request)) {
            return;
        }

        if ($this->getAuthenticator() !== null && ! $this->lastSeen?->isExpiring()) {
            return;
        }

        $stored = $this->store->get($this->tokenKey());

        if ($stored !== null && ! $stored->isExpiring()) {
            $this->hold($stored);

            return;
        }

        $this->refreshToken();
    }

    protected function reauthenticate(): void
    {
        $this->refreshToken();
    }

    protected ?ClassicToken $lastSeen = null;

    private function hold(ClassicToken $token): ClassicToken
    {
        $this->lastSeen = $token;
        $this->authenticate(new AccessTokenAuthenticator($token->accessToken, $token->refreshToken, $token->expiresAt->toDateTimeImmutable()));

        return $token;
    }

    /**
     * The key the token pair is stored under: one per gateway and client, hashed so neither appears in the store.
     */
    private function tokenKey(): string
    {
        return sha1($this->resolveBaseUrl().'|'.$this->clientId);
    }

    private function refused(Response $response): ArubaApiException
    {
        $exception = ArubaApiException::fromResponse($response);

        if ($exception instanceof UnauthorizedException) {
            // The refresh token has expired (15 days unused), been revoked, or been used already by another copy of
            // this application: the stored pair is no use now.
            $this->store->forget($this->tokenKey());
        }

        return $exception;
    }
}

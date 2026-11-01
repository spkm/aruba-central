<?php

namespace spkm\ArubaCentral\Central;

use DateTimeImmutable;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\OAuthAuthenticator;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Request;
use Saloon\Repositories\Body\ArrayBodyRepository;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Resources\HasResources;
use spkm\ArubaCentral\Query\Query as BaseQuery;

/**
 * The connection to one new Central tenant: its HPE GreenLake API client's token (fetched with the client
 * credentials grant before the first request and cached, encrypted, until it is about to expire), timeouts and
 * retries, with a resource for every API new Central documents and ad-hoc calls for anything else.
 */
class CentralConnector extends ArubaConnector
{
    use ClientCredentialsGrant;
    use HasResources;

    /**
     * Where HPE GreenLake issues tokens for Central-scoped API clients.
     */
    public const TOKEN_URL = 'https://sso.common.cloud.hpe.com/as/token.oauth2';

    public function __construct(protected string $clientId, protected string $clientSecret, string $baseUrl, protected string $tokenUrl = self::TOKEN_URL)
    {
        parent::__construct($baseUrl);

        $this->oauthConfig()->setClientId($clientId);
        $this->oauthConfig()->setClientSecret($clientSecret);
    }

    public function side(): string
    {
        return 'central';
    }

    public function newQuery(): BaseQuery
    {
        return Query::make();
    }

    protected function defaultOauthConfig(): OAuthConfig
    {
        return OAuthConfig::make()
            ->setTokenEndpoint($this->tokenUrl)
            ->setAllowBaseUrlOverride()
            ->setRequestModifier(function (Request $request) {
                // GreenLake takes the client's credentials as a form, with no scope.
                $body = $request instanceof HasBody ? $request->body() : null;

                if ($body instanceof ArrayBodyRepository) {
                    $body->remove('scope');
                }
            });
    }

    protected function isTokenRequest(Request $request): bool
    {
        return $request instanceof GetClientCredentialsTokenRequest;
    }

    /**
     * Fetches a token (from the cache, or from GreenLake) before the connector's first request, and a new one once
     * the token it holds is a minute from expiring, as a connector in a long-running worker needs. Building a
     * connector never contacts Central.
     */
    protected function ensureAuthenticated(Request $request): void
    {
        if ($this->isTokenRequest($request)) {
            return;
        }

        if ($this->getAuthenticator() === null || $this->tokenExpiresWithinAMinute()) {
            $this->authenticate($this->getCachedAccessToken());
        }
    }

    protected function reauthenticate(): void
    {
        Cache::forget($this->tokenCacheKey());
        $this->authenticate($this->cacheAccessToken());
    }

    /**
     * The token for this tenant and client, from the cache when one is there with time left, else from GreenLake.
     */
    public function getCachedAccessToken(): OAuthAuthenticator
    {
        $cached = Cache::get($this->tokenCacheKey());

        if (is_string($cached)) {
            try {
                $token = json_decode(Crypt::decryptString($cached), true, flags: JSON_THROW_ON_ERROR);
            } catch (DecryptException|JsonException) {
                $token = null;
            }

            if (is_string($token['access_token'] ?? null) && is_int($token['expires_at'] ?? null)) {
                return new AccessTokenAuthenticator($token['access_token'], null, new DateTimeImmutable('@'.$token['expires_at']));
            }
        }

        return $this->cacheAccessToken();
    }

    /**
     * Forget the token held and cached, so the next request fetches a new one.
     */
    public function forgetToken(): void
    {
        Cache::forget($this->tokenCacheKey());
        $this->authenticator = null;
    }

    private function tokenExpiresWithinAMinute(): bool
    {
        $authenticator = $this->getAuthenticator();
        $expiresAt = $authenticator instanceof AccessTokenAuthenticator ? $authenticator->getExpiresAt() : null;

        return $expiresAt !== null && $expiresAt->getTimestamp() - 60 <= Carbon::now()->getTimestamp();
    }

    /**
     * The token's cache key: one per tenant and client, hashed so neither appears in the cache.
     */
    private function tokenCacheKey(): string
    {
        return 'aruba.central.token.'.sha1($this->resolveBaseUrl().'|'.$this->clientId);
    }

    private function cacheAccessToken(): AccessTokenAuthenticator
    {
        try {
            /** @var AccessTokenAuthenticator $authenticator */
            $authenticator = $this->getAccessToken();
        } catch (RequestException $exception) {
            throw ArubaApiException::fromResponse($exception->getResponse());
        }

        $expiresAt = $authenticator->getExpiresAt();

        if ($expiresAt === null) {
            return $authenticator;
        }

        Cache::put(
            $this->tokenCacheKey(),
            Crypt::encryptString(json_encode([
                'access_token' => $authenticator->getAccessToken(),
                'expires_at' => $expiresAt->getTimestamp(),
            ], JSON_THROW_ON_ERROR)),
            Carbon::instance($expiresAt)->subMinute(),
        );

        return $authenticator;
    }
}

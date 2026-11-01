<?php

namespace spkm\ArubaCentral\Classic\TokenStore;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use spkm\ArubaCentral\Classic\ClassicToken;

/**
 * Keeps each token pair in the application's cache, encrypted and without expiry. A flushed cache loses the
 * current refresh token, after which a new one must be generated in Central.
 */
class CacheTokenStore implements TokenStore
{
    public function __construct(protected ?string $store = null) {}

    public function get(string $key): ?ClassicToken
    {
        $cached = Cache::store($this->store)->get($this->cacheKey($key));

        if (! is_string($cached)) {
            return null;
        }

        try {
            $values = json_decode(Crypt::decryptString($cached), true, flags: JSON_THROW_ON_ERROR);
        } catch (DecryptException|JsonException) {
            return null;
        }

        return is_array($values) ? ClassicToken::from($values) : null;
    }

    public function put(string $key, ClassicToken $token): void
    {
        Cache::store($this->store)->forever($this->cacheKey($key), Crypt::encryptString(json_encode($token->toArray(), JSON_THROW_ON_ERROR)));
    }

    public function forget(string $key): void
    {
        Cache::store($this->store)->forget($this->cacheKey($key));
    }

    private function cacheKey(string $key): string
    {
        return 'aruba.classic.token.'.$key;
    }
}

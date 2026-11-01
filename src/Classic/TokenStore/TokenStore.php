<?php

namespace spkm\ArubaCentral\Classic\TokenStore;

use spkm\ArubaCentral\Classic\ClassicToken;

/**
 * Where a classic Central connection keeps its current token pair between requests and processes. Each refresh
 * replaces the refresh token and invalidates the old one, so the store must outlive the cache.
 */
interface TokenStore
{
    /**
     * The token pair stored under the key, or null when there is none.
     */
    public function get(string $key): ?ClassicToken;

    public function put(string $key, ClassicToken $token): void;

    public function forget(string $key): void;
}

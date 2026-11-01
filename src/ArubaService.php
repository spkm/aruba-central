<?php

namespace spkm\ArubaCentral;

use BadMethodCallException;
use InvalidArgumentException;
use spkm\ArubaCentral\Central\CentralConnector;
use spkm\ArubaCentral\Classic\ClassicConnector;
use spkm\ArubaCentral\Classic\TokenStore\CacheTokenStore;
use spkm\ArubaCentral\Classic\TokenStore\FileTokenStore;
use spkm\ArubaCentral\Classic\TokenStore\TokenStore;

/**
 * What the Aruba facade resolves: a connector to new Central and one to classic Central for the default tenant and
 * for each named connection, each built from config('aruba') the first time it is needed. Methods the service
 * doesn't have go to the default new Central connector.
 *
 * @mixin CentralConnector
 */
class ArubaService
{
    /** @var array<string, CentralConnector> */
    protected array $central = [];

    /** @var array<string, ClassicConnector> */
    protected array $classic = [];

    /**
     * The new Central connector: the default tenant's, or a named connection's.
     */
    public function central(?string $connection = null): CentralConnector
    {
        return $this->central[$connection ?? ''] ??= $this->connectCentral($this->settings('central', $connection), $this->describe('new Central', $connection));
    }

    /**
     * The classic Central connector: the default tenant's, or a named connection's.
     */
    public function classic(?string $connection = null): ClassicConnector
    {
        return $this->classic[$connection ?? ''] ??= $this->connectClassic($this->settings('classic', $connection), $this->describe('classic Central', $connection));
    }

    /**
     * The new Central connector for another tenant, configured under aruba.connections.{name}.
     */
    public function connection(string $name): CentralConnector
    {
        return $this->central($name);
    }

    /**
     * @param  array<mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        $connector = $this->central();

        if (method_exists($connector, $method)) {
            return $connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * @return array<string, mixed>
     */
    private function settings(string $side, ?string $connection): array
    {
        if ($connection === null) {
            return (array) config("aruba.$side");
        }

        $settings = config("aruba.connections.$connection");

        if (! is_array($settings)) {
            throw new InvalidArgumentException('No Aruba connection named "'.$connection.'" is configured in aruba.connections.');
        }

        return is_array($settings[$side] ?? null) ? $settings[$side] : [];
    }

    private function describe(string $side, ?string $connection): string
    {
        return $connection === null ? "The default $side connection" : "The $side connection \"$connection\"";
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function connectCentral(array $config, string $connection): CentralConnector
    {
        $this->require($config, $connection, ['base_url', 'client_id', 'client_secret']);
        $tokenUrl = $config['token_url'] ?? config('aruba.central.token_url');

        return new CentralConnector($config['client_id'], $config['client_secret'], $config['base_url'], is_string($tokenUrl) && $tokenUrl !== '' ? $tokenUrl : CentralConnector::TOKEN_URL);
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function connectClassic(array $config, string $connection): ClassicConnector
    {
        $this->require($config, $connection, ['base_url', 'client_id', 'client_secret']);
        $seed = $config['refresh_token'] ?? null;

        return new ClassicConnector($config['client_id'], $config['client_secret'], $config['base_url'], $this->tokenStore($config), is_string($seed) && $seed !== '' ? $seed : null);
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function tokenStore(array $config): TokenStore
    {
        $store = $config['token_store'] ?? config('aruba.classic.token_store', 'file');

        if ($store instanceof TokenStore) {
            return $store;
        }

        $store = is_string($store) && $store !== '' ? $store : 'file';
        $path = $config['token_path'] ?? config('aruba.classic.token_path');

        return match ($store) {
            'file' => new FileTokenStore(is_string($path) && $path !== '' ? $path : storage_path('app/aruba-central')),
            'cache' => new CacheTokenStore(config('aruba.cache.store')),
            default => class_exists($store) && is_subclass_of($store, TokenStore::class)
                ? app($store)
                : throw new InvalidArgumentException('"'.$store.'" is not a token store: use file, cache or the class name of a '.TokenStore::class.'.'),
        };
    }

    /**
     * @param  array<string, mixed>  $config
     * @param  list<string>  $settings
     */
    private function require(array $config, string $connection, array $settings): void
    {
        foreach ($settings as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException("$connection needs a $setting.");
            }
        }
    }
}

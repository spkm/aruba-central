<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use LogicException;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\Profile;
use spkm\ArubaCentral\Central\Requests\Config\Profile\CreateProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\DeleteProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\GetProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\GetProfilesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\ReplaceProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\UpdateProfileRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The profiles of one configuration type, such as wlan-ssids or roles, from Aruba::configuration()->{type}(). Every type
 * has the same six operations: list, read by name, create (store), replace, update and delete, in the library
 * (the default) or local to a scope (local()).
 *
 * @extends Builder<Profile>
 */
class ProfileResource extends Builder
{
    protected string $idField = 'name';

    /**
     * @param  string  $profileType  The type's path segment, such as wlan-ssids.
     * @param  string  $recordKey  The key Central wraps the list in, "profile" for most types.
     * @param  array<string, mixed>  $scope  Parameters sent with every request: view-type, object-type, scope-id, device-function.
     */
    public function __construct(ArubaConnector $connector, protected string $profileType, protected string $recordKey = 'profile', protected array $scope = [])
    {
        parent::__construct($connector, Profile::class);
    }

    public function profileType(): string
    {
        return $this->profileType;
    }

    /**
     * The same profiles as local to a scope (a site, device group or device) and device function, rather than the
     * library: LOCAL view-type on reads and LOCAL object-type on writes.
     */
    public function local(string $scopeId, string $deviceFunction): static
    {
        $local = clone $this;
        $local->scope = ['view-type' => 'LOCAL', 'object-type' => 'LOCAL', 'scope-id' => $scopeId, 'device-function' => $deviceFunction];

        return $local;
    }

    /**
     * The library profiles (the default).
     */
    public function library(): static
    {
        $library = clone $this;
        $library->scope = [];

        return $library;
    }

    /**
     * Create a profile under the given name: POST /network-config/v1alpha1/{profile-type}/{name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function store(string $name, array|Data $attributes, array $options = []): mixed
    {
        return $this->fetch(new CreateProfileRequest($this->profileType, $name, $this->payloadOf($attributes), [...$this->writeScope(), ...$options]));
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetProfilesRequest($this->profileType, $this->recordKey, $query->with($this->readScope()));
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetProfileRequest($this->profileType, (string) $id, $this->readScope());
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        $name = $options['name'] ?? $body['name'] ?? null;

        if (! is_string($name) || $name === '') {
            throw new LogicException("Central's API documents no way to create a profile without a name: use store(\$name, \$attributes).");
        }

        unset($options['name']);

        return new CreateProfileRequest($this->profileType, $name, $body, [...$this->writeScope(), ...$options]);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateProfileRequest($this->profileType, (string) $id, $body, [...$this->writeScope(), ...$options]);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new ReplaceProfileRequest($this->profileType, (string) $id, $body, [...$this->writeScope(), ...$options]);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteProfileRequest($this->profileType, (string) $id, [...$this->writeScope(), ...$options]);
    }

    /**
     * @return array<string, mixed>
     */
    private function readScope(): array
    {
        return array_diff_key($this->scope, ['object-type' => true]);
    }

    /**
     * @return array<string, mixed>
     */
    private function writeScope(): array
    {
        return array_diff_key($this->scope, ['view-type' => true]);
    }
}

<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\AddBlacklistClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\DeleteBlacklistClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\GetBlacklistClientsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The denylist clients API, from Aruba::configuration()->denylist().
 *
 * @extends BaseResource<Data>
 */
class DenylistResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add denylist clients: POST /configuration/v1/swarm/{device_id}/blacklisting.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addBlacklistClients(string $deviceId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AddBlacklistClientsRequest($deviceId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete denylist clients: DELETE /configuration/v1/swarm/{device_id}/blacklisting.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteBlacklistClients(string $deviceId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteBlacklistClientsRequest($deviceId, $this->payloadOf($attributes), $options));
    }

    /**
     * Get all denylist client mac address in device.: GET /configuration/v1/swarm/{device_id}/blacklisting.
     *
     * @param  array<string, mixed>  $options
     */
    public function getBlacklistClients(string $deviceId, array $options = []): mixed
    {
        return $this->fetch(new GetBlacklistClientsRequest($deviceId, $options));
    }
}

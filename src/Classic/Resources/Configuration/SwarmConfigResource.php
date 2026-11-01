<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig\GetSwarmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig\UpdateSwarmConfigRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Swarm Config API, from Aruba::configuration()->swarmConfig().
 *
 * @extends BaseResource<Data>
 */
class SwarmConfigResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get an existing swarm config.: GET /configuration/v2/swarm_config/{guid}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSwarmConfig(string $guid, array $options = []): mixed
    {
        return $this->fetch(new GetSwarmConfigRequest($guid, $options));
    }

    /**
     * Update an existing swarm config.: POST /configuration/v2/swarm_config/{guid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateSwarmConfig(string $guid, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateSwarmConfigRequest($guid, $this->payloadOf($attributes), $options));
    }
}

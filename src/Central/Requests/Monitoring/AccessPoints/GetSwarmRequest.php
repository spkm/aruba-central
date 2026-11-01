<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\SwarmInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a Swarm details: GET /network-monitoring/v1/swarms/{cluster-id}.
 *
 * Query options: site-id.
 */
class GetSwarmRequest extends ItemRequest
{
    protected ?string $dto = SwarmInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $clusterId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/swarms/'.rawurlencode((string) $this->clusterId);
    }
}

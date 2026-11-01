<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\NeighborDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get neighbor details reported by AP via LLDP.: GET /topology_external_api/apNeighbors/{device_serial}.
 */
class DisplayTopologyApNeighborsRequest extends ItemRequest
{
    protected ?string $dto = NeighborDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/apNeighbors/'.rawurlencode((string) $this->deviceSerial);
    }
}

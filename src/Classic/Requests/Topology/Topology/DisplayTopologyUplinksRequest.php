<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\UplinkResponseDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of an uplink.: GET /topology_external_api/uplinks/{source_serial}/{uplink_id}.
 */
class DisplayTopologyUplinksRequest extends ItemRequest
{
    protected ?string $dto = UplinkResponseDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $sourceSerial, protected string $uplinkId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/uplinks/'.rawurlencode((string) $this->sourceSerial).'/'.rawurlencode((string) $this->uplinkId);
    }
}

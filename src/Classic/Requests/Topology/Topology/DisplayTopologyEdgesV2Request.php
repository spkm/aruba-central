<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\EdgeResponseDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of an edge for the selected source and destination.: GET /topology_external_api/v2/edges/{source_serial}/{dest_serial}.
 */
class DisplayTopologyEdgesV2Request extends ItemRequest
{
    protected ?string $dto = EdgeResponseDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $sourceSerial, protected string $destSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/topology_external_api/v2/edges/'.rawurlencode((string) $this->sourceSerial).'/'.rawurlencode((string) $this->destSerial);
    }
}

<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\EdgeResponseDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of an edge.: GET /topology_external_api/edges/{source_serial}/{dest_serial}.
 */
class DisplayTopologyEdgesRequest extends ItemRequest
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
        return '/topology_external_api/edges/'.rawurlencode((string) $this->sourceSerial).'/'.rawurlencode((string) $this->destSerial);
    }
}

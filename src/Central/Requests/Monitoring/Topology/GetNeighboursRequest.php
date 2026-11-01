<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Topology;

use spkm\ArubaCentral\Central\Data\Monitoring\Neighbours;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns details of neighbor devices for a given serial number.: GET /network-monitoring/v1/neighbours/{serial-number}.
 */
class GetNeighboursRequest extends ItemRequest
{
    protected ?string $dto = Neighbours::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/neighbours/'.rawurlencode((string) $this->serialNumber);
    }
}

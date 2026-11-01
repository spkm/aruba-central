<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Topology;

use spkm\ArubaCentral\Central\Data\Monitoring\LinksDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns link details between a device and one of its neighbours.: GET /network-monitoring/v1/devices/{serial-number}/neighbours/{neighbour-serial-number}.
 */
class GetDeviceNeighbourLinkRequest extends ItemRequest
{
    protected ?string $dto = LinksDetail::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $neighbourSerialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/devices/'.rawurlencode((string) $this->serialNumber).'/neighbours/'.rawurlencode((string) $this->neighbourSerialNumber);
    }
}

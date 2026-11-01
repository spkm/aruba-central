<?php

namespace spkm\ArubaCentral\Classic\Requests\Topology\Topology;

use spkm\ArubaCentral\Classic\Data\Topology\UnreachableDeviceList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of unreachable devices in a site.: GET /unreachableDevices/{site_id}.
 */
class DisplayTopologyExpiringDevicesRequest extends ItemRequest
{
    protected ?string $dto = UnreachableDeviceList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/unreachableDevices/'.rawurlencode((string) $this->siteId);
    }
}

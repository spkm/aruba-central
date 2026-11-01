<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Topology;

use spkm\ArubaCentral\Central\Data\Monitoring\UnmanagedDevice;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns details for an unmanaged device of a given site.: GET /network-monitoring/v1/unmanaged-device/{mac-address}.
 */
class GetUnmanagedDeviceRequest extends ItemRequest
{
    protected ?string $dto = UnmanagedDevice::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/unmanaged-device/'.rawurlencode((string) $this->macAddress);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['site-id' => $this->siteId, ...parent::defaultQuery()];
    }
}
